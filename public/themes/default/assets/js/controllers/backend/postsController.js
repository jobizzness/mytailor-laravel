(function () {
   'use strict';


	app.controller("PostsController", function($scope,  $timeout) {

		$scope.createPost = function(){
			$scope.showForm = true;
		}

		$scope.tinymceOptions = {
		    onChange: function(e) {
		      // put logic here for keypress and cut/paste changes
		    },
		    inline: false,
		    plugins : 'advlist autolink link image lists charmap print preview',
		    skin: 'lightgray',
		    theme : 'modern'
		  };

			 });


})();