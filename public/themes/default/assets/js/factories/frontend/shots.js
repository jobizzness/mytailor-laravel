app.factory('shotsFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function($resource, params){
     	return $http.get('/api/v1/'+$resource, {params:params});
     };

        // will return object of a single shot
    this.show = function (name) {
        return $http.get("/api/v1/shots/" + name);
    };

    this.viewed = function(name){
        return $http.post("/api/v1/shot/viewed/" + name);
    };

    this.explore = function(params){
       return $http.get('/api/v1/explore/', {params:params});
    };

    this.like = function($name){
       return $http.get('/api/v1/shot/'+$name+'/like');
    };


    return this;
}]);
