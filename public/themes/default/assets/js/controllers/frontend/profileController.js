'use strict';

app.controller("profileController", ["$scope","designersFactory","NgMap","$Request",
    function($scope, designersFactory, NgMap, $Request) {

        $scope.shots = [];
        $scope.busy = false;
        $scope.$emit('AppIsLoaded', 'done');
        $scope.after = '/?page=1';
        $scope.per_page = 0;

        var pathArray = window.location.pathname.split( '/' );
        var $username = pathArray[1],
            $page = $Request.search('page', $scope.after);

        /**
         * gets Designers from storage.
         *
         * @param $sort
         */
        $scope.getshots = function($username, $params){

            designersFactory.shots($username, $params).then(function(response){

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
         * Loads more shots from server
         */
        $scope.updateShots = function(){
                if ($scope.busy || !$page) return;
                if($page==1){

                    $scope.busy = false;
                    
                } else{$scope.busy = true;}
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
