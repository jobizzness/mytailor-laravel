app.filter('findByName', function() {

    return function(input, name) {
        var i=0, len=input.length;
        for (; i<len; i++) {
            var itemName = input[i].name;
            if (itemName == name) {
                return input[i];
            }
        }
        return null;
    }
});