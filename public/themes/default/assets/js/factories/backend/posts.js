	app.factory('postFactory', ['$http', function($http){

			this.create = function(post){
				return $http.post('/admin/blog', post);
			};

			return this;
	}]);



