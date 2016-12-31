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

/*!
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
/* eslint-env browser */
(function() {
  'use strict';

  // Check to make sure service workers are supported in the current browser,
  // and that the current page is accessed from a secure origin. Using a
  // service worker from an insecure origin will trigger JS console errors. See
  // http://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features
  var isLocalhost = Boolean(window.location.hostname === 'localhost' ||
      // [::1] is the IPv6 localhost address.
      window.location.hostname === '[::1]' ||
      // 127.0.0.1/8 is considered localhost for IPv4.
      window.location.hostname.match(
        /^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/
      )
    );

  if ('serviceWorker' in navigator &&
      (window.location.protocol === 'https:' || isLocalhost)) {
    navigator.serviceWorker.register('/service-worker.js')
    .then(function(registration) {
      // updatefound is fired if service-worker.js changes.
      registration.onupdatefound = function() {
        // updatefound is also fired the very first time the SW is installed,
        // and there's no need to prompt for a reload at that point.
        // So check here to see if the page is already controlled,
        // i.e. whether there's an existing service worker.
        if (navigator.serviceWorker.controller) {
          // The updatefound event implies that registration.installing is set:
          // https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-container-updatefound-event
          var installingWorker = registration.installing;

          installingWorker.onstatechange = function() {
            switch (installingWorker.state) {
              case 'installed':
                // At this point, the old content will have been purged and the
                // fresh content will have been added to the cache.
                // It's the perfect time to display a "New content is
                // available; please refresh." message in the page's interface.
                break;

              case 'redundant':
                throw new Error('The installing ' +
                                'service worker became redundant.');

              default:
                // Ignore
            }
          };
        }
      };
    }).catch(function(e) {
      console.error('Error during service worker registration:', e);
    });
  }

  // Your custom JavaScript goes here

})();


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

                ga('send', {
                  hitType: 'event',
                  eventCategory: 'PaginatedContent',
                  eventAction: 'scroll',
                  eventLabel: 'Load More'
                });
            };

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
                    
                    var $shot = $filter('findByName')($scope.shots, data.name);
                    if($shot){
                        $log.info('a shot was just viewed');
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
                    var itemName = input[i].name;
                if (itemName == name) {
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

		app.controller("shotController", ["$scope","shotsFactory", "$timeout","$window",

		function($scope, shotsFactory, $timeout, $window) {

					var $name = $window.location.href;

					$name = $name.substring($name.lastIndexOf('/')+1);

			 		$timeout(function(){
			 		 	shotsFactory.viewed($name);
			 		 }, 1500);
		}

			]);
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
						{link: '/explore/african-prints-pants', text: 'Pants'}, {link: '/explore/african-fashion-bikini', text: 'Bikini'},
						{link: '/explore/african-prints-swimwear', text: 'Swimwear'}, {link: '/explore/african-fashion-tops', text: 'Tops'},
						{link: '/explore/african-prints-skirts', text: 'Skirts'}, {link: '/explore/african-fashion-hijab', text: 'Hijab'},
						{link: '/explore/african-fashion-mens', text: 'For Men'}, {link: '/explore/african-fashion-summer-wears', text: 'summer'},
						{link: '/explore/african-prints-shorts', text: 'Shorts'}, {link: '/explore/african-fashion-couples', text: 'Couples'}
					]},

					{name:'Style', dropElements: [

						{link: '/explore/african-fashion-Pprints', text: 'Prints'}, {link: '/explore/african-fashion-classic-wears', text: 'Classic'},
						{link: '/explore/african-prints-modern', text: 'Modern'},
						{link: '/explore/african-fashion-ankara', text: 'Ankara'}, {link: '/explore/african-prints-kitenge', text: 'Kitenge'},
						{link: '/explore/african-fashion-leather', text: 'Leather'}, {link: '/explore/african-fashion-ankara', text: 'Ankara'},
						{link: '/explore/african-prints-lace', text: 'Lace'}, {link: '/explore/african-fashion-dashiki', text: 'Dashiki'}
					]},

					{name:'Accessories', dropElements: [

						{link: '/explore/african-prints-necklace', text: 'Necklaces'}, {link: '/explore/african-prints-headwrap', text: 'Head wrap'}
					]},

					{name:'Occasional', dropElements: [

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

    this.explore = function(params){
       return $http.get('/api/v1/explore/', {params:params});
    };



    return this;
}]);

//# sourceMappingURL=frontend.js.map
