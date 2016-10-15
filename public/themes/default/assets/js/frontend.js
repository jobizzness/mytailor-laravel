/*
 |--------------------------------------------------------------------------
 | Main Application Bootstrap File
 |--------------------------------------------------------------------------
 |
 | This File holds all important configurations and main application module
 | without this file the whole app will not work. Main app module is declared
 | here and modules needed by our app.
 |
 |*/


/**
 * App module is declared here.
 *
 * @var app
 */
var app = angular.module('app', ['ngAnimate', 'ngMessages', 'ngSanitize', 'ui.select',
                                'ngDialog', 'infinite-scroll', 'angularGrid', 'pusher-angular'])

    .value('THROTTLE_MILLISECONDS', 5000);

/**
 * Path to {Angular} Templates

 * @type {string}
 */
var template_path = '/themes/default/views/segments/';

/**
 * Configurations are declared here.
 */
app.config(function (ngDialogProvider) {

    //force dialog reload.
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
app.controller("MainController", ["$scope", "ngDialog", "shotFactory", function($scope, ngDialog, shotFactory) {

    //$location.search({ref: ''});

    $scope.toggle = false;
    $scope.showForm = false;
    $scope.searching = false;
    $scope.links = shotFactory.getParmalinks();

    $scope.config = {
        autoHideScrollbar: false,
        theme: 'light',
        advanced:{
            updateOnContentResize: true
        },
        setHeight: 200,
        scrollInertia: 0
    };

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
        }); //Dialogs
    };


   $scope.showShotPoster = function(){

        ngDialog.open({
            closeByNavigation: true,
            cache:false,
            template: template_path + 'shot-upload.html', className: 'mt-large-overlay' ,
            controller: 'shotsController'
        }); //Dialog
}


}]); //End

app.controller("authController", ["$scope",

    function($scope, $location) {

        //$location.path('/').search({id: '92938920'});

        $scope.token = angular.element(document.getElementById('csrf')).val();

    }]);
	'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",
                    "shotsFactory", "$timeout", '$pusher', "$filter",
                    "$log",
        function($scope, ngDialog, $window, shotsFactory, $timeout, $pusher, $filter, $log) {

            var client = new Pusher('67b6f9a2b88b9350c8fa');
            var pusher = $pusher(client);

            $scope.shots = [];
            $scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

            var pathArray = window.location.pathname.split( '/' );

            var $slug = pathArray[2] ? pathArray[2] : 'trending',
                $cat = getParameterByName('cat') || null,
                $page = getParameterByName('page', $scope.after);

            pusher.subscribe('shotsChannel');

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            $scope.getShots = function($repo, $slug, $params){

                shotsFactory.index($repo, $slug, $params).then(function(response){

                    var items = response.data.response.shots.data;

                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.shots.push(value);
                    });

                    $scope.after = response.data.response.shots['nextPage'];
                    $page = getParameterByName('page', $scope.after);
                });
            };


            /**
             * Loads more shots from server
             */
            $scope.updateShots = function($repo){
                if ($scope.busy) return;
                if(!$page) return;

                $scope.busy = true;
                $scope.getShots($repo, $slug, {cat: $cat, page:$page});
                $scope.busy = false;

            };

            /**
             * Open Shot Overlay
             *
             * @param $name
             */
			$scope.open = function ($name) {

				$name = $name.replace(/\.[^/.]+$/, "");


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

            //Move To Custom Helpers
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }


            /**
             * Icrement Views when a shot is viewed
             */
            pusher.bind('shotWasViewed',
                function(data) {
                    $log.info('a shot was just viewed');
                    var $shot = $filter('findByName')($scope.shots, data.name);
                    if($shot){
                        $shot.views++; 
                    }
                }
            );




		}]);

    /**
     * Move this to a Custom Filters Refactor id possible
     */
    app.filter('findByName', function() {

        return function(input, name) {
            var i=0, len=input.length;
            for (; i<len; i++) {
                    var shot = input[i].file_name.replace(/\.[^/.]+$/, "");
                if (shot == name) {
                    return input[i];
                }
            }
            return null;
        }
    });
	'use strict';

	app.controller("ovalController", ["$scope","shotsFactory", "$timeout",

		function($scope, shotsFactory, $timeout) {
			
		 		 shotsFactory.show($scope.name).then(function(response){
		 				$scope.shot = response.data.response.data;
		 		});

		 		$timeout(function(){
		 		 	shotsFactory.viewed($scope.name);
		 		 }, 1500);
		}

			]);

		// app.controller("shotController", ["$scope","shotsFactory", "$timeout","$window",

		// function($scope, shotsFactory, $timeout, $window) {

		// 			var $name = $window.location.href;

		// 			$name = $name.substring($name.lastIndexOf('/')+1);

		// 	 		$timeout(function(){
		// 	 		 	shotsFactory.viewed($name);
		// 	 		 }, 1500);
		// }

		// 	]);
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


			return this;
	}]);

app.factory('shotsFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function($resource,$sort, params){
     	return $http.get('/api/v1/'+$resource+'/'+$sort, {params:params});
     };

        // will return object of a single shot
    this.show = function (name) {
        return $http.get("/api/v1/shot/" + name);
    };

    this.viewed = function(name){
        return $http.post("/api/v1/shot/viewed/" + name);
    };

    //this.explore = function($slug, params){
    //    return $http.get('/api/explore/'+$slug, {params:params});
    //};



    return this;
}]);

//# sourceMappingURL=frontend.js.map
