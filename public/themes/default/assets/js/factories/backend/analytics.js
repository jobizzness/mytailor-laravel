	app.factory('maFactory', ['$http', function($http){

			// will return object of a single shot
			this.ma_get_users = function () {
			  	return $http.get("/admin/api/ma/users");
			};

			return this;
	}]);