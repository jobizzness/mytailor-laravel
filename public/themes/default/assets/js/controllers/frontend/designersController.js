	'use strict';

	app.controller("designersController", ["$scope","designersFactory","NgMap","$Request","ngDialog",
		function($scope, designersFactory, NgMap, $Request, ngDialog) {

			$scope.designers = [];
			$scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

            // App is done loading
            $scope.$emit('AppIsLoaded', 'done');

			//Google Map URL with API
		    $scope.googleMapsUrl = 'https://maps.google.com/maps/api/js?v=3.20&key=AIzaSyDMknbbjCbtZVr3Ga4n7Fnr1dJDr8lvZoA';

		    //Custom Map Styles
		    $scope.mapStyles=[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];

			//Slider configuration
		    $scope.slickConfig2 = {autoplay: true,infinite: true,autoplaySpeed: 5000,slidesToShow: 3,slidesToScroll: 1,method: {}};

		    var pathArray = window.location.pathname.split( '/' );
		    var $sort = pathArray[2] ? pathArray[2] : 'local',
                $page = $Request.search('page', $scope.after);

            /**
             * gets Designers from storage.
             *
             * @param $sort
             */
            $scope.getDesigners = function($params){

                designersFactory.index($params).then(function(response){

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
              if ($scope.busy || !$page) return;
              if($page==1){

                  $scope.busy = false;
                  
              } else{$scope.busy = true;}
              $scope.getDesigners({page:$page, sort:$sort});

              if($page > 1){
                  ga('send', {
                      hitType: 'event',
                      eventCategory: 'PaginatedContent',
                      eventAction: 'scroll',
                      eventLabel: 'Load More Shots'
                  });
              }

            };


	}]);    
