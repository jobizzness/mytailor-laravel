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