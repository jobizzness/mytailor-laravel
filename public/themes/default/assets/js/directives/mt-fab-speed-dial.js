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
app.directive('mtFabSpeedDial', function () {
	return {
		restrict:'E',
		template:
		'<div>' +
                '<div>' +
                    '<button id="@{{shot.id}}"class="mdl-button mdl-js-button mdl-button--icon">' +
                      '<i class="mdi mdi-share-variant"></i>' +
                    '</button>' +
                  '</div>' +
                '<ul class="share-fab__list">' +
                  '<li><a ng-click="mtTap" class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised"><i class="mdi mdi-facebook-box"></i></a></li>' +
                  '<li><a ng-click="mtTap" class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised"><i class="mdi mdi-twitter"></i></a></li>' +
                  '<li><a ng-click="mtTap" class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised"><i class="mdi mdi-link"></i></a></li>' +
                 ' <li><a ng-click="mtTap" class="mdl-button mdl-js-button mdl-button--icon mdl-button--raised"><i class="mdi mdi-pinterest"></i></a></li>' +
                '</ul>' +
              '</div>'
	}
});