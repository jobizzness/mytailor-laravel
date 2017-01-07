	'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",
                    "shotsFactory", "$timeout", '$pusher', "$filter",
                    "$log","$Request",
        function($scope, ngDialog, $window, shotsFactory, $timeout, $pusher, $filter, $log, $Request) {

            var client = new Pusher('67b6f9a2b88b9350c8fa');
            var pusher = $pusher(client);

            $scope.shots = [];
            $scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

            var pathArray = window.location.pathname.split( '/' );

            var $slug = pathArray[2] ? pathArray[2] : 'trending',
                $cat = $Request.search('cat') || null,
                $page = $Request.search('page', $scope.after);

            pusher.subscribe('shotsChannel');

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            $scope.getShots = function($repo, $slug, $params){

                shotsFactory.index($repo, $slug, $params).then(function(response){

                    var items = response.data.response.shots.data;

                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.shots.push(value);
                    });

                    $scope.after = response.data.response.shots['nextPage'];
                    $page = $Request.search('page', $scope.after);
                });
            };


            /**
             * Loads more shots from server
             */
            $scope.updateShots = function($repo){
                if ($scope.busy) return;
                if(!$page) return;

                $scope.busy = true;
                $scope.getShots($repo, $slug, {cat: $cat, page:$page});
                $scope.busy = false;

                ga('send', {
                  hitType: 'event',
                  eventCategory: 'PaginatedContent',
                  eventAction: 'scroll',
                  eventLabel: 'Load More'
                });
            };

            /**
             * Open Shot Overlay
             *
             * @param $name
             */
			$scope.open = function ($name) {

                if(window.innerWidth < 430){
                    window.location = '/shot/'+$name;
                    return;
                }

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

            /**
             * Icrement Views when a shot is viewed
             */
            pusher.bind('shotWasViewed',
                function(data) {
                    
                    var $shot = $filter('findByName')($scope.shots, data.name);
                    if($shot){
                        $log.info('a shot was just viewed');
                        $shot.views++; 
                    }
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
                    var itemName = input[i].name;
                if (itemName == name) {
                    return input[i];
                }
            }
            return null;
        }
    });