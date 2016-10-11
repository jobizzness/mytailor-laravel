

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
                    var tpj=jQuery;         
                    var revapi48;
                    
                      if(tpj("#rev_slider_48_1").revolution != undefined){
                        
                        revapi48 = tpj("#rev_slider_48_1").show().revolution({
                          sliderType:"standard",
                          jsFileLocation:"../../revolution/js/",
                          sliderLayout:"fullscreen",
                          dottedOverlay:"none",
                          delay:9000,
                          navigation: {
                            keyboardNavigation:"on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation:"off",
                            onHoverStop:"off",
                            touch:{
                              touchenabled:"on",
                              swipe_threshold: 75,
                              swipe_min_touches: 1,
                              swipe_direction: "vertical",
                              drag_block_vertical: false
                            }
                          },
                          responsiveLevels:[1240,1024,778,480],
                          gridwidth:[1240,1024,778,480],
                          gridheight:[868,768,960,720],
                          lazyType:"none",
                          shadow:0,
                          spinner:"off",
                          stopLoop:"on",
                          stopAfterLoops:0,
                          stopAtSlide:1,
                          shuffle:"off",
                          autoHeight:"off",
                          fullScreenAlignForce:"off",
                          fullScreenOffsetContainer: "",
                          fullScreenOffset: "",
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
                      } // RevSlider ends


        });
        
})(jQuery);