// Here we declare our ng-app and modules we need
var app = angular.module('app', ['ngAnimate', 'ngMessages', 'ngSanitize', 'ui.select',
        'ngDialog', 'ngScrollbars', 'infinite-scroll', 'angularGrid', 'pusher-angular'])
    .value('THROTTLE_MILLISECONDS', 5000);



var template_path = '/themes/default/views/segments/';

app.config(function (ngDialogProvider) {
    ngDialogProvider.setForceHtmlReload(true);
});

