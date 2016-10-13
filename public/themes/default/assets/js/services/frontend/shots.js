app.factory('shotsFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function($resource,$sort, params){
     	return $http.get('/api/v1/'+$resource+'/'+$sort, {params:params});
     };

        // will return object of a single shot
    this.show = function (name) {
        return $http.get("/api/v1/shot/" + name);
    };

    this.viewed = function(name){
        return $http.post("/api/v1/shot/viewed/" + name);
    };

    //this.explore = function($slug, params){
    //    return $http.get('/api/explore/'+$slug, {params:params});
    //};



    return this;
}]);
