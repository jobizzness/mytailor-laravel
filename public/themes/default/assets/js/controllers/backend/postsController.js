(function () {
   'use strict';


	app.controller("PostsController", function($scope,  $timeout, shotFactory) {


		$scope.showpostForm = function(){
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

		  /**
             * Updates a shot and responds with a snackbar.
             *
             */
			$scope.createPost = function(){
				shotFactory.create($scope.post).then(function(response){
    				var responseData = response.data;
					  
					  	var snackbarContainer = document.querySelector('#demo-snackbar-example');
					    var data = {
					      			message: responseData,
					      			timeout: 2000,
					      			actionText: 'Undo'
					    		};
					    snackbarContainer.MaterialSnackbar.showSnackbar(data);
			 	});
			 };


			 });


})();