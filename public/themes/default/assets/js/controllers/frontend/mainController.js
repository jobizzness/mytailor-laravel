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
        //$scope.links = shotFactory.getParmalinks();

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