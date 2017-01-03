

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


                      //RevSlider
                   var tpj=jQuery,      
            revapi88;

          tpj(document).ready(function() {
            if(tpj("#rev_slider_88_1").revolution == undefined){
              revslider_showDoubleJqueryError("#rev_slider_88_1");
            }else{
              revapi88 = tpj("#rev_slider_88_1").show().revolution({
                sliderType:"standard",
                jsFileLocation:"../../revolution/js/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                  onHoverStop:"off",
                },
                responsiveLevels:[521,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[521,500,400,270],
                lazyType:"none",
                parallax: {
                  type:"scroll",
                  origo:"slidercenter",
                  speed:2000,
                  levels:[2,3,4,5,6,7,12,16,10,50],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                stopAtSlide:1,
                shuffle:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                  simplifyAll:"off",
                  nextSlideOnWindowFocus:"off",
                  disableFocusListener:false,
                }
              });
            }
          }); /*ready*/


        });
        
})(jQuery);