

(function($) {


    // Global variables

        var $body = $('body'),
            $window = $(window);

        //Initializa all plugins
        $window.on('load', function(){

                  //Waves Buttons
                    Waves.attach('.btn', ['waves-button', 'waves-float']);
                    Waves.init();

                    //wow
                    new WOW().init();

        });
        
})(jQuery);