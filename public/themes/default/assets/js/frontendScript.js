

(function($) {


    // Global variables

        var $body = $('body'),
            $window = $(window),
            id = $('.pageContainer').attr('id'),
            $header = $('.mt-header'),
            $banner = $('.hero-viewport');

        $(function() {

                //========== Search icon on small devices ==========
                      $('.mt-toggle-search').click(function() {
             
                             if ($(this).children().first().attr('data-type') == 'search') {
                                  $('.pull-left').hide();
                                $(this).children().first().attr('data-type', 'close');
                                $(this).find('.icon-center').removeClass('mdi-magnify');
                                $(this).find('.icon-center').addClass('mdi-close-circle');
                                $('.mt-search-wrapper').removeClass('hide-on-phone');
                      }
                // Search bar is currently showing
                      else {
                          $('.pull-left').show();
                          $(this).children().first().attr('data-type', 'search');
                          $('.mt-search-wrapper').addClass('hide-on-phone');
                          $(this).find('.icon-center').removeClass('mdi-close-circle');
                          $(this).find('.icon-center').addClass('mdi-magnify');
                      }
                    });


            var $searchbox = $('#search-box input'),
                $mtcontainer = $('.mt-content'),
                $searchcontainer = $('#mt-search-container')


                    search_show = function(){
                      
                      $mtcontainer.removeClass('fadeIn');
                      $searchcontainer.removeClass('fadeOut');

                      $mtcontainer.addClass('animated fadeOut');
                      setTimeout(function() {
                            $mtcontainer.fadeOut('fast');
                        }, 350);

                      $searchcontainer.show().addClass('animated fadeIn');

                      return true;

                  }

                  search_hide = function(){

                      $mtcontainer.removeClass('fadeOut');
                      $searchcontainer.removeClass('fadeIn');

                      $searchcontainer.addClass('fadeOut')
                        setTimeout(function() {
                              $searchcontainer.fadeOut('fast');
                          }, 350);

                    $mtcontainer.addClass('fadeIn').show();

                    return false;
                  }

            //Search Animations

            if ($searchbox.val()){

                    search_show();
                  };

             //event     
            $searchbox.on('keyup', function(){

              if ($(this).val()){
                    search_show();

              }else{
                  search_hide();
              }
            });



            //Aleart timer
            $card = $('#card-alert') ? $('#card-alert'): null;
            if($card){
                setTimeout(function(){

                      $card.removeClass('bounceInRight').addClass('bounceOutRight').hide(500);

              }, 8000);
            };

        });
    
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
          
            if(tpj("#rev_slider_48_1").revolution == undefined){
              
            }else{
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