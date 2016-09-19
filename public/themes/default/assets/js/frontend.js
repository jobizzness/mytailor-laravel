// Here we declare our ng-app and modules we need
var app = angular.module('app', ['ngAnimate', 'ngMessages', 'ngSanitize', 'ui.select', 'ngDialog']);

var template_path = '/themes/default/views/segments/';

app.config(function (ngDialogProvider) {
    ngDialogProvider.setForceHtmlReload(true);
});

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
	'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",

		function($scope, ngDialog, $window) {

			$scope.open = function ($name) {

				$name = $name.replace(/\.[^/.]+$/, "");

				if ($window.innerWidth < 768) {

					$window.location.href = '/shot/'+ $name;
					return;
				};

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
	'use strict';

	app.controller("ovalController", ["$scope","shotFactory", "$timeout",

		function($scope, shotFactory, $timeout) {
			
			 		 shotFactory.show($scope.name).then(function(response){
			 				$scope.shot = response.data;
			 		});

			 		$timeout(function(){
			 		 	shotFactory.viewed($scope.name);
			 		 }, 1500);
		}

			]);

		app.controller("shotController", ["$scope","shotFactory", "$timeout","$window",

		function($scope, shotFactory, $timeout, $window) {

					var $name = $window.location.href;

					$name = $name.substring($name.lastIndexOf('/')+1);

			 		$timeout(function(){
			 		 	shotFactory.viewed($name);
			 		 }, 1500);
		}

			]);
'use strict';

	app.controller("designersController", ["$scope","shotFactory",

		function($scope, shotFactory) {

//this should be moved
			// angular.forEach(angular.element(document.querySelector(".designer-item")), function(value, key){
			//      var a = angular.element(value);
			//      a.addClass('ss');

			// });
		}

		]);
	app.factory('shotFactory', ['$http', function($http){

			// will return object of a single shot
			this.show = function (name) {
			  	return $http.get("/api/shot/" + name);
			};

			this.viewed = function(name){
				return $http.post("/api/shot/viewed/" + name);
			};

			this.getParmalinks = function(){
				var data = [
					{name:'Type', dropElements: [

						{link: '/explore/african-prints-shirts', text: 'Shirt'}, {link: '/explore/african-fashion-dress', text: 'Dresses'},
						{link: '/explore/african-fashion-blazers', text: 'Blazers'}, {link: '/explore/african-fashion-outfits', text: 'Outfits'},
						{link: '/explore/african-fashion-jackets', text: 'Jackets'}, {link: '/explore/african-fashion-prints-women', text: 'Women'},
						{link: '/explore/african-prints-pants', text: 'Pants'}, {link: '/explore/african-fashion-prints-bikini', text: 'Bikini'},
						{link: '/explore/african-prints-swimwear', text: 'Swimwear'}, {link: '/explore/african-fashion-prints-tops', text: 'Tops'},
						{link: '/explore/african-prints-skirts', text: 'Skirts'}, {link: '/explore/african-fashion-prints-hijab', text: 'Hijab'},
						{link: '/explore/african-fashion-prints-men', text: 'For Men'}, {link: '/explore/african-fashion-prints-summer-wears', text: 'summer'},
						{link: '/explore/african-prints-shorts', text: 'Shorts'}
					]},

					{name:'Style', dropElements: [

						{link: '/explore/african-fashion-prints', text: 'Prints'}, {link: '/explore/african-fashion-classic-wears', text: 'Classic'},
						{link: '/explore/african-prints-modern', text: 'Modern'}, {link: '/explore/african-fashion-classic-wears', text: 'Classic'},
						{link: '/explore/african-fashion-prints-ankara', text: 'Ankara'}, {link: '/explore/african-prints-kitenge', text: 'Kitenge'},
						{link: '/explore/african-fashion-prints-leather', text: 'Leather'}, {link: '/explore/african-fashion-prints-ankara', text: 'Ankara'},
						{link: '/explore/african-prints-lace', text: 'Lace'}, {link: '/explore/african-fashion-prints-dashiki', text: 'Dashiki'}
					]},

					{name:'Accessories', dropElements: [

						{link: '/explore/african-prints-necklace', text: 'Necklaces'}, {link: '/explore/african-prints-headwrap', text: 'Head wrap'}
					]},

					{name:'Occassional', dropElements: [

						{link: '/explore/african-prints-wedding', text: 'Wedding'}, {link: '/explore/african-prints-work-wears', text: 'work'},
						{link: '/explore/african-prints-party-wear', text: 'Party'}, {link: '/explore/african-prints-special', text: 'special'}
					]},
				];
				return data;
			}

			// this.update = function(id, shot){
			// 	return $http.put('/admin/shots/' + id, shot);
			// };

			// this.destroy = function(name){
			// 	return $http.delete('/admin/shots/' + name);
			// };

			return this;
	}]);

//# sourceMappingURL=frontend.js.map
