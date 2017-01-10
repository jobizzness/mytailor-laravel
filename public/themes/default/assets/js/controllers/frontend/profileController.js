'use strict';

app.controller("profileController", ["$scope","designersFactory","NgMap","$Request",
    function($scope, designersFactory, NgMap, $Request) {

        $scope.shots = [];
        $scope.busy = false;
        $scope.$emit('AppIsLoaded', 'done');
        $scope.after = '/?page=1';
        $scope.per_page = 0;

        var pathArray = window.location.pathname.split( '/' );
        var $username = pathArray[2] ? pathArray[2] : null,
            $page = $Request.search('page', $scope.after);

        /**
         * gets Designers from storage.
         *
         * @param $sort
         */
        $scope.getshots = function($username, $params){

            designersFactory.shots($username, $params).then(function(response){

                var items = response.data.response.designers.data;
                $scope.per_page = $scope.per_page +response.data.per_page;

                angular.forEach(items, function(value, key) {
                    $scope.shots.push(value);
                });

                $scope.after = response.data.response.designers['nextPage'];
                $page = $Request.search('page', $scope.after);
                $scope.busy = false;
            });
        };


        /**
         * Loads more shots from server
         */
        $scope.updateShots = function(){
            if ($scope.busy || !$page) return;
            $scope.busy = true;
            $scope.getshots($username, {page:$page});

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
