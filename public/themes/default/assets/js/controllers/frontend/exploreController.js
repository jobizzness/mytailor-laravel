	'use strict';

	app.controller("exploreController", ["$scope","shotsFactory","ngDialog",
        function($scope, shotsFactory, ngDialog) {

            $scope.sections = [];
            $scope.busy = false;

            // App is done loading
            $scope.$emit('AppIsLoaded', 'done');

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            (function($params){

                shotsFactory.explore($params).then(function(response){

                   
                    var items = response.data;

                    angular.forEach(items, function(value, key) {
                        $scope.sections.push(value.response);
                    });

                });
            })();


		}]);
