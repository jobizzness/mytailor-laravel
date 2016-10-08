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

