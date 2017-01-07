	app.factory('pageFactory', ['$http', function($http){

			this.store = function(data){
				return $http.post('/admin/pages', data)
			};
			return this;
	}]);
