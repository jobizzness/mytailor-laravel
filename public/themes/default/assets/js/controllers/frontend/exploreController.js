	'use strict';

	app.controller("exploreController", ["$scope","shotsFactory",
        function($scope, shotsFactory) {

            $scope.sections = [];
            $scope.busy = false;

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            (function($params){

                shotsFactory.explore($params).then(function(response){

                    console.log(response);
                    var items = response.data;

                    angular.forEach(items, function(value, key) {
                        $scope.sections.push(value.response);
                    });

                });
            })();


		}]);
