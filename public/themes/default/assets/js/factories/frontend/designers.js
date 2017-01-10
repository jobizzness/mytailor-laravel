app.factory('designersFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function(params){
     	return $http.get('/api/v1/designers', {params:params});
     };

    this.shots = function($username, params){
        return $http.get('/api/v1/'+$username+'/shots', {params:params});
    };



    return this;
}]);
