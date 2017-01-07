app.factory('designersFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function($sort, params){
     	return $http.get('/api/v1/designers/'+$sort, {params:params});
     };



    return this;
}]);
