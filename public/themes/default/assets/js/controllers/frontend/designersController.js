	'use strict';

	app.controller("designersController", ["$scope","designersFactory","NgMap","$Request","ngDialog",
		function($scope, designersFactory, NgMap, $Request, ngDialog) {

			$scope.designers = [];
			$scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

			//Google Map URL with API
		    $scope.googleMapsUrl = 'https://maps.google.com/maps/api/js?v=3.20&key=AIzaSyDMknbbjCbtZVr3Ga4n7Fnr1dJDr8lvZoA';

		    //Custom Map Styles
		    $scope.mapStyles=[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];

			//Slider configuration
		    $scope.slickConfig2 = {autoplay: true,infinite: true,autoplaySpeed: 5000,slidesToShow: 3,slidesToScroll: 1,method: {}};

		    var pathArray = window.location.pathname.split( '/' );
		    var $slug = pathArray[2] ? pathArray[2] : 'local',
                $page = $Request.search('page', $scope.after);

            /**
             * gets Designers from storage.
             *
             * @param $sort
             */
            $scope.getDesigners = function($slug, $params){

                designersFactory.index($slug, $params).then(function(response){

                    var items = response.data.response.designers.data;
                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.designers.push(value);
                    });

                    $scope.after = response.data.response.designers['nextPage'];
                    $page = $Request.search('page', $scope.after);
                });
            };


            /**
             * Loads more shots from server
             */
            $scope.updateDesigners = function($repo){
                if ($scope.busy) return;
                if(!$page) return;

                $scope.busy = true;
                $scope.getDesigners($slug, {page:$page});
                $scope.busy = false;

                ga('send', {
                  hitType: 'event',
                  eventCategory: 'PaginatedContent',
                  eventAction: 'scroll',
                  eventLabel: 'Load More Designers'
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


	}]);    
