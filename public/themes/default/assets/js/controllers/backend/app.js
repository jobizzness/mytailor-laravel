// Here we declare our ng-app and modules we need
var app = angular.module('app', ['ngAnimate', 
								'ngMessages', 
								'ngSanitize', 
								'ui.select', 
								'ngDialog', 
								'gridshore.c3js.chart',
							 	'ui.tinymce'
							 ]);


var template_path = '/themes/default/views/segments/';

app.config(function (ngDialogProvider) {
    ngDialogProvider.setForceHtmlReload(true);
});