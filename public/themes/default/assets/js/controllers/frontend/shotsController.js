	'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",
                    "shotsFactory", "$timeout", '$pusher', "$filter",

		function($scope, ngDialog, $window, shotsFactory, $timeout, $pusher, $filter) {

            var client = new Pusher('67b6f9a2b88b9350c8fa');
            var pusher = $pusher(client);

            $scope.shots = [];
            $scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

            var pathArray = window.location.pathname.split( '/' );

            var $sort = pathArray[2],
                $cat = getParameterByName('cat') || null,
                $page = getParameterByName('page', $scope.after);

            pusher.subscribe('shotsChannel');

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            $scope.getShots = function($repo,$sort, $params){

                shotsFactory.index($repo, $sort, $params).then(function(response){

                    var items = response.data.data;

                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.shots.push(value);
                    });

                    //for (var i = 0; i < items.length; i++) {
                    //    console.log(items[i]);
                    //    $scope.shots.push(items[i]);
                    //}


                    $scope.after = response.data['next_page_url'];
                    $page = getParameterByName('page', $scope.after);
                });
            };

            /**
             * Loads more shots from server
             */
            $scope.updateShots = function($repo){
                if ($scope.busy) return;
                if(!$page) return;

                $scope.busy = true;

                $scope.getShots($repo, $sort, {cat: $cat, page:$page});
                $scope.busy = false;

            };

            /**
             * Open Shot Overlay
             *
             * @param $name
             */
			$scope.open = function ($name) {

				$name = $name.replace(/\.[^/.]+$/, "");


				var dialogScope = $scope.$new();
				dialogScope.name = $name;
				history.pushState({}, '', '/shot/'+$name);

    			ngDialog.open({
    				closeByNavigation: true,
				    cache:false, 
    				template: template_path + 'shots_overlay.html', className: 'mt-shots-overlay' ,
    				controller: 'ovalController',
				    scope: dialogScope,
					preCloseCallback: function() {
				       		history.back();
				            return true;
    				}

				    
    			});

			};

            //Move To Custom Helpers
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }


            /**
             * Icrement Views when a shot is viewed
             */
            pusher.bind('shotWasViewed',
                function(data) {

                    var $shot = $filter('findByName')($scope.shots, data.name);
                    $shot.views++;

                }
            );




		}]);

    /**
     * Move this to a Custom Filters Refactor id possible
     */
    app.filter('findByName', function() {

        return function(input, name) {
            var i=0, len=input.length;
            for (; i<len; i++) {
                    var shot = input[i].file_name.replace(/\.[^/.]+$/, "");
                if (shot == name) {
                    return input[i];
                }
            }
            return null;
        }
    });