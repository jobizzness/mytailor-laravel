app.factory('shotsFactory', ['$http', function($http){

        this.items = [];
        this.busy = false;
        this.after = '';


     this.index = function($resource,$sort, params){
     	return $http.get('/api/v1/'+$resource+'/'+$sort, {params:params});
     };

    //this.explore = function($slug, params){
    //    return $http.get('/api/explore/'+$slug, {params:params});
    //};

    //this.updateShots = function() {
    //    if (this.busy) return;
    //    this.busy = true;
    //
    //    var url = "https://api.reddit.com/hot?after=" + this.after ;
    //    $http.get(url).success(function(data) {
    //        var items = data.data.children;
    //        for (var i = 0; i < items.length; i++) {
    //            this.items.push(items[i].data);
    //        }
    //        this.after = "t3_" + this.items[this.items.length - 1].id;
    //        this.busy = false;
    //    }.bind(this));
    //};

    // this.destroy = function(name){
    // 	return $http.delete('/admin/shots/' + name);
    // };

    return this;
}]);
