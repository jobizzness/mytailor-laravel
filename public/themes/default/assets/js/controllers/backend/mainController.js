/*
 * @author Jobizzness@gmail.com
 * Application scripts
 *
 */




/*
 * Sidebar toggle
 *
 */
app.controller("MainController", function($scope, ngDialog, $location) {

    $scope.toggle = false;
    $scope.showForm = false;

    $scope.toggleSidebar = function () {
        $scope.toggle = !$scope.toggle;
    };

    $scope.regsign = function($q){
        history.pushState({}, '', '/'+$q);

        ngDialog.open({
            closeByNavigation: true,
            cache:false,
            template: template_path + $q+'.html', className: 'small-oval-theme' ,
            controller: 'authController',
            preCloseCallback: function() {
                history.back();
                return true;
            }
        }); //Dialog
    };


});

app.controller("authController", ["$scope",

    function($scope, $location) {

        $scope.token = angular.element(document.getElementById('csrf')).val();

    }]);