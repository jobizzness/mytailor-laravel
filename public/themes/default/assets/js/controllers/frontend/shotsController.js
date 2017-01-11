/*
 |--------------------------------------------------------------------------
 | Shots Controller Class
 |--------------------------------------------------------------------------
 |
 | This is mostly responsible for loading our apps direct methods and
 | Linking with other classes. So Our app communicates with other modules
 | through here. If disabled, the app wont be able to do any work.
 |
 */

    'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",
                    "shotsFactory", "$timeout","$filter",
                    "$log","$Request", "$rootScope",
        function($scope, ngDialog, $window, shotsFactory, $timeout, $filter, $log, $Request, $rootScope) {

            /**
             * shots items will be stored here.
             * @type {Array}
             */
            $scope.shots = [];

            /**
             * For async operations.
             * @type {boolean}
             */
            $scope.busy = false;

            /**
             * Page URL
             * @type {string}
             */
            $scope.after = '/?page=1';

            /**
             * shots per page
             * @type {number}
             */
            $scope.per_page = 0;

            var pathArray = window.location.pathname.split( '/' );

            var $slug = pathArray[2] ? pathArray[2] : 'trending',
                $cat = $Request.search('cat') || null,
                $page = $Request.search('page', $scope.after);

        /*****************************************************************************
         *
         * Methods for Event Listeners.
         *
         ****************************************************************************/


            /**
             * Subscribe pusher to shotschannel
             */
            $rootScope.pusher.subscribe('shotsChannel');

            /**
             * Icrement Views when a shot is viewed
             */
            $rootScope.pusher.bind('shotWasViewed',
                function(data) {
                    var $shot = $filter('findByName')($scope.shots, data.name);
                    if($shot){
                        $shot.views++;
                    }
                }
            );

            /*****************************************************************************
             *
             * Methods to update/refresh the UI
             *
             ****************************************************************************/
            /**
             * Loads more shots from server
             */
            $scope.updateShots = function($repo){
                if ($scope.busy || !$page) return;
                if($page==1){
                    // The shots are available now.
                    $scope.$emit('AppIsLoaded', 'done');

                    $scope.busy = false;
                } else{$scope.busy = true;}

                
                $scope.getShots($repo, {cat: $cat, page:$page,sort:$slug});

                if($page > 1){
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'PaginatedContent',
                        eventAction: 'scroll',
                        eventLabel: 'Load More Shots'
                    });
                }

            };

            /**
             * Like or unlike a shot
             * @param $name
             */
            $scope.like = function($name) {
                shotsFactory.like($name).then(function(response){
                    toggleLike($name);
                });
            }
            /*****************************************************************************
             *
             * Methods for dealing with the model
             *
             ****************************************************************************/

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            $scope.getShots = function($repo, $params){

                shotsFactory.index($repo, $params).then(function(response){
                    var items = response.data.response.shots.data;
                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.shots.push(value);
                    });
                    $scope.after = response.data.response.shots['nextPage'];
                    $page = $Request.search('page', $scope.after);
                    $scope.busy = false;
                });
            };

            /**
             * Toggle like
             * @param $name
             * @return {boolean}
             */
            var toggleLike = function($name){
                    $shot = $filter('findByName')($scope.shots, $name);

                  if($shot.likes.is_liked == true){
                        $shot.likes.like_count--;
                        return $shot.likes.is_liked = false;
                  }
                      $shot.likes.like_count++;
                      return $shot.likes.is_liked = true;
            }

            
		}]);
