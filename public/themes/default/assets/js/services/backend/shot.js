	app.factory('shotFactory', ['$http', function($http){

			// will return object of a single shot
			this.show = function (name) {
			  	return $http.get("/admin/shots/" + name);
			};

			this.get = function(){
				return $http.get("/admin/shots/");
			};

			this.update = function(id, shot){
				return $http.put('/admin/shots/' + id, shot);
			};

			this.destroy = function(name){
				return $http.delete('/admin/shots/' + name);
			};

			return this;
	}]);

	app.factory('tagFactory', ['$http', function($http){

			// 
			this.show = function () {
			  	return $http.get("/admin/tags");
			};
			return this;
	}]);


