
app.service('imageUploader', function () {
	
            this.store = function(file){
                if (file) {
                    file.upload = Upload.upload({
                        url: 'https://angular-file-upload-cors-srv.appspot.com/upload',
                        data: {file: file}
                    });

                    file.upload.then(function (response) {
                       
                            file.result = response.data;

                    }, function (response) {
                        if (response.status > 0)
                            $scope.errorMsg = response.status + ': ' + response.data;
                    }, function (evt) {
                        file.progress = Math.min(100, parseInt(100.0 * 
                                                 evt.loaded / evt.total));
                    });
                }   
            }

            return this;

});