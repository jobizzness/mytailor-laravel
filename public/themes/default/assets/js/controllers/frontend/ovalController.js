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

app.controller("ShotUploadCtrl", ['$scope', 'imageUploader', 'fileReader', function($scope, imageUploader, fileReader) {

	        $scope.progress = 0;

	        fileReader.readAsDataUrl($scope.file, $scope).then(function(result) {
	                $scope.image = result;
	        });

	        $scope.storeShot = function(){
	        	imageUploader.store($scope.file)
	        }

			            //Display the file
            //Wait for user to trigger send
            //Store
	}]);

app.directive("ngFileSelect",function(){

  return {
    link: function($scope,el){
      
      el.bind("change", function(e){
      
        $scope.file = (e.srcElement || e.target).files[0];
        $scope.getFile();
      })
      
    }
    
  }
  
  
});