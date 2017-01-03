	'use strict';

	app.controller("exploreController", ["$scope","shotsFactory","ngDialog",
        function($scope, shotsFactory, ngDialog) {

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
