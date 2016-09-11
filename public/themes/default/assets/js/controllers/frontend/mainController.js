/*
 * @author Jobizzness@gmail.com
 * Application scripts
 *
 */




/*
 * Sidebar toggle
 *
 */
app.controller("MainController", function($scope, ngDialog, shotFactory) {

    //$location.search({ref: ''});

    $scope.toggle = false;
    $scope.showForm = false;
    $scope.searching = false;
    $scope.links = shotFactory.getParmalinks();

    $scope.toggleSidebar = function () {
        $scope.toggle = !$scope.toggle;
    };

    //function Ref(event) {
    //    ga('send', 'event', {
    //        eventCategory: 'Inbound Link',
    //        eventAction: 'click',
    //        eventLabel: event.target.href
    //    });
    //};

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


   $scope.showShotPoster = function(){

        ngDialog.open({
            closeByNavigation: true,
            cache:false,
            template: template_path + 'shot-upload.html', className: 'shot-upload' ,
            controller: 'shotsController'
        }); //Dialog
}

});

app.controller("authController", ["$scope",

    function($scope, $location) {

        //$location.path('/').search({id: '92938920'});

        $scope.token = angular.element(document.getElementById('csrf')).val();

    }]);