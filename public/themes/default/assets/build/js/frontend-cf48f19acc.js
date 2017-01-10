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
                                'ngDialog', 'angularGrid', 'pusher-angular', 
                                'slickCarousel','ngMap']);

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
 |--------------------------------------------------------------------------
 | Application Main Class
 |--------------------------------------------------------------------------
 |
 | This is mostly responsible for loading our apps direct methods and
 | Linking with other classes. So Our app communicates with other modules
 | through here. If disabled, the app wont be able to do any work.
 |
 */

    'use strict';
    app.controller("MainController", ["$scope", "ngDialog", "shotFactory", "$pusher", "$rootScope",
                            function($scope, ngDialog, shotFactory, $pusher, $rootScope) {

        /**
         * State of the App
         * @type {boolean}
         */
        $scope.loading = true;

        /**
         * Toggle Sidebar
         * @type {boolean}
         */
        $scope.toggle = false;

        /**
         * Initialize pusher and store ref in root
          * @type {Pusher}
         */
        var client = new Pusher('67b6f9a2b88b9350c8fa');
        $rootScope.pusher = $pusher(client);

        // we should look into this
        $scope.links = shotFactory.getParmalinks();

        /*****************************************************************************
         *
         * Methods for Event Listeners.
         *
         ****************************************************************************/

        /**
         * When the app is loaded this will fire ->*
         * @return {boolean}
         */
        $scope.$on('AppIsLoaded', function (event, data) {
            return $scope.loading = false;
        });

        /*****************************************************************************
         *
         * Methods for dealing with the model
         *
         ****************************************************************************/

        /**
         * Toggle sidebar method
         */
        $scope.toggleSidebar = function () {
            $scope.toggle = !$scope.toggle;
        };


        /*****************************************************************************
         *
         * Methods for dealing dialogs
         *
         ****************************************************************************/
        /**
         * Opens Shot Dialog View
         * @param $name
         */
        $scope.open = function ($name) {

            if(window.innerWidth < 430){window.location = '/shot/'+$name;return;}

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

        /**
         * Open Shot Poster Dialog
         */
       $scope.showShotPoster = function(){

            ngDialog.open({
                closeByNavigation: true,
                cache:false,
                template: template_path + 'shot-upload.html', className: 'mt-large-overlay' ,
                controller: 'shotsController'
            }); //Dialog
    }


    }]); //End
/*
 |--------------------------------------------------------------------------
 | Shots Controller Class
 |--------------------------------------------------------------------------
 |
 | This is mostly responsible for loading our apps direct methods and
 | Linking with other classes. So Our app communicates with other modules
 | through here. If disabled, the app wont be able to do any work.
 |
 */

    'use strict';

	app.controller("shotsController", ["$scope", "ngDialog","$window",
                    "shotsFactory", "$timeout","$filter",
                    "$log","$Request", "$rootScope",
        function($scope, ngDialog, $window, shotsFactory, $timeout, $filter, $log, $Request, $rootScope) {

            /**
             * shots items will be stored here.
             * @type {Array}
             */
            $scope.shots = [];

            /**
             * For async operations.
             * @type {boolean}
             */
            $scope.busy = false;

            /**
             * Page URL
             * @type {string}
             */
            $scope.after = '/?page=1';

            /**
             * shots per page
             * @type {number}
             */
            $scope.per_page = 0;

            var pathArray = window.location.pathname.split( '/' );

            var $slug = pathArray[2] ? pathArray[2] : 'trending',
                $cat = $Request.search('cat') || null,
                $page = $Request.search('page', $scope.after);

        /*****************************************************************************
         *
         * Methods for Event Listeners.
         *
         ****************************************************************************/


            /**
             * Subscribe pusher to shotschannel
             */
            $rootScope.pusher.subscribe('shotsChannel');

            /**
             * Icrement Views when a shot is viewed
             */
            $rootScope.pusher.bind('shotWasViewed',
                function(data) {
                    var $shot = $filter('findByName')($scope.shots, data.name);
                    if($shot){
                        $shot.views++;
                    }
                }
            );

            /*****************************************************************************
             *
             * Methods to update/refresh the UI
             *
             ****************************************************************************/
            /**
             * Loads more shots from server
             */
            $scope.updateShots = function($repo){
                if ($scope.busy || !$page) return;
                if($page==1){
                    // The shots are available now.
                    $scope.$emit('AppIsLoaded', 'done');
                }
                $scope.busy = true;
                $scope.getShots($repo, {cat: $cat, page:$page,sort:$slug});

                if($page > 1){
                    ga('send', {
                        hitType: 'event',
                        eventCategory: 'PaginatedContent',
                        eventAction: 'scroll',
                        eventLabel: 'Load More Shots'
                    });
                }

            };

            /**
             * Like or unlike a shot
             * @param $name
             */
            $scope.like = function($name) {
                shotsFactory.like($name).then(function(response){
                    toggleLike($name);
                });
            }
            /*****************************************************************************
             *
             * Methods for dealing with the model
             *
             ****************************************************************************/

            /**
             * gets shots from storage.
             *
             * @param $sort
             */
            $scope.getShots = function($repo, $params){

                shotsFactory.index($repo, $params).then(function(response){
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
             * Toggle like
             * @param $name
             * @return {boolean}
             */
            var toggleLike = function($name){
                    $shot = $filter('findByName')($scope.shots, $name);

                  if($shot.likes.is_liked == true){
                        $shot.likes.like_count--;
                        return $shot.likes.is_liked = false;
                  }
                      $shot.likes.like_count++;
                      return $shot.likes.is_liked = true;
            }

            
		}]);

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

                    console.log(response);
                    var items = response.data;

                    angular.forEach(items, function(value, key) {
                        $scope.sections.push(value.response);
                    });

                });
            })();


		}]);

	'use strict';

	app.controller("designersController", ["$scope","designersFactory","NgMap","$Request","ngDialog",
		function($scope, designersFactory, NgMap, $Request, ngDialog) {

			$scope.designers = [];
			$scope.busy = false;
            $scope.after = '/?page=1';
            $scope.per_page = 0;

            // App is done loading
            $scope.$emit('AppIsLoaded', 'done');

			//Google Map URL with API
		    $scope.googleMapsUrl = 'https://maps.google.com/maps/api/js?v=3.20&key=AIzaSyDMknbbjCbtZVr3Ga4n7Fnr1dJDr8lvZoA';

		    //Custom Map Styles
		    $scope.mapStyles=[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];

			//Slider configuration
		    $scope.slickConfig2 = {autoplay: true,infinite: true,autoplaySpeed: 5000,slidesToShow: 3,slidesToScroll: 1,method: {}};

		    var pathArray = window.location.pathname.split( '/' );
		    var $sort = pathArray[2] ? pathArray[2] : 'local',
                $page = $Request.search('page', $scope.after);

            /**
             * gets Designers from storage.
             *
             * @param $sort
             */
            $scope.getDesigners = function($params){

                designersFactory.index($params).then(function(response){

                    var items = response.data.response.designers.data;
                    $scope.per_page = $scope.per_page +response.data.per_page;

                    angular.forEach(items, function(value, key) {
                        $scope.designers.push(value);
                    });

                    $scope.after = response.data.response.designers['nextPage'];
                    $page = $Request.search('page', $scope.after);
                });
            };


            /**
             * Loads more shots from server
             */
            $scope.updateDesigners = function($repo){
                if ($scope.busy) return;
                if(!$page) return;

                $scope.busy = true;
                $scope.getDesigners({page:$page, sort:$sort});
                $scope.busy = false;

                ga('send', {
                  hitType: 'event',
                  eventCategory: 'PaginatedContent',
                  eventAction: 'scroll',
                  eventLabel: 'Load More Designers'
                });
            };


	}]);    

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


     this.index = function($resource, params){
     	return $http.get('/api/v1/'+$resource, {params:params});
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

    this.like = function($name){
       return $http.get('/api/v1/shot/'+$name+'/like');
    };


    return this;
}]);

app.factory('designersFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function(params){
     	return $http.get('/api/v1/designers', {params:params});
     };

    this.shots = function($username, params){
        return $http.get('/api/v1/'+$username+'/shots', {params:params});
    };



    return this;
}]);


app.service('$Request', function () {
	
	            //Move To Custom Helpers
            this.search = function(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            return this;

});
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
app.filter('linkfy',['$filter', '$sce',
    function($filter, $sce) {
        return function(text, target) {
            if (!text) return text;

            var replacedText = $filter('linky')(text, target);
            var targetAttr = "";
            if (angular.isDefined(target)) {
                targetAttr = ' target="' + target + '"';
            }

            // replace #hashtags
            var replacePattern1 = /(^|\s)#(\w*[a-zA-Z_]+\w*)/gim;
            replacedText = replacedText.replace(replacePattern1, '$1<a href="https://www.afrodapp.com/explore/$2"' + targetAttr + '>#$2</a>');

            // replace @mentions
            var replacePattern2 = /(^|\s)\@(\w*[a-zA-Z_]+\w*)/gim;
            replacedText = replacedText.replace(replacePattern2, '$1<a href="https://www.afrodapp.com/$2"' + targetAttr + '>@$2</a>');

            $sce.trustAsHtml(replacedText);
            return replacedText;
        };
    }
]);
//# sourceMappingURL=frontend.js.map
