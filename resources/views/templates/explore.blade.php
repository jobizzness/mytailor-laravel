
@section('bg', 'grey60')
@section('header_type', 'just-main')

@section('page_styles')

  <!-- RS5.0 Main Stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/settings.css')}}">
   
  <!-- RS5.0 Layers and Navigation Styles -->
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/layers.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/navigation.css')}}">

  <!-- LOADING FONTS AND ICONS -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,900,100,600,400" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
  
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/fonts/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{theme('css/vendor/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{theme('css/vendor/slick-carousel/slick/slick-theme.css')}}">
@endsection
<section class="hero md-whiteframe-4dp" style="margin-top:0px;">
    <div class="cover-container">
        <div class="hero-viewport">
            @include('layouts.template.frontend.partials.sliders.video')
        </div>
    </div>
</section>
<section>

  <div style="margin:5em;">
      <h1 class="section_title">Top Shots</h1>
      {{-- Explore Items Here --}}
      <slick settings="slickConfig2" 
            lazy-load="ondemand" 
            prev-arrow=".slick-prev" 
            next-arrow=".slick-next"
            class="tops-shots-slider"
            ng-repeat="n in [1,3]">
        <!-- Shot Template -->
          <div class="mdl-card md-whiteframe-4dp top-shots-item" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
              <!-- Figure -->
              <figure style="height: 346px;">
                  <a class="mt-grid___link" ng-click="open(shot.name)">
                      <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                          <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                      </div>
                  </a>
              </figure>
            </div>
        </slick>

        {{-- Categories --}}
        <section>
          <h1 class="section_title" style="margin-left: 0;">Categories</h1>
          <slick settings="slickConfig2" 
            lazy-load="ondemand" 
            prev-arrow=".slick-prev" 
            next-arrow=".slick-next"
            class="tops-shots-slider"
            >
          <!-- Shot Template -->
          <div class="mdl-card md-whiteframe-4dp" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
              <!-- Figure -->
              <figure style="height: 200px;">
                  <a class="mt-grid___link" ng-click="open(shot.name)">
                      <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                          <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                      </div>
                  </a>
              </figure>
            </div>
          </slick>
        </section>

        {{-- Spepcif Category --}}
          <section>
            <h1 class="section_title">Dress</h1>
            <slick settings="slickConfig2" 
              lazy-load="ondemand" 
              prev-arrow=".slick-prev" 
              next-arrow=".slick-next"
              class="tops-shots-slider"
              >
            <!-- Shot Template -->
            <div class="mdl-card md-whiteframe-4dp top-shots-item" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
                <!-- Figure -->
                <figure style="height: 346px;">
                    <a class="mt-grid___link" ng-click="open(shot.name)">
                        <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                            <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                        </div>
                    </a>
                </figure>
              </div>
            </slick>
          </section>

          <section>
            <h1 class="section_title">Shirts</h1>
            <slick settings="slickConfig2" 
              lazy-load="ondemand" 
              prev-arrow=".slick-prev" 
              next-arrow=".slick-next"
              class="tops-shots-slider"
              >
            <!-- Shot Template -->
            <div class="mdl-card md-whiteframe-4dp top-shots-item" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
                <!-- Figure -->
                <figure style="height: 346px;">
                    <a class="mt-grid___link" ng-click="open(shot.name)">
                        <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                            <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                        </div>
                    </a>
                </figure>
              </div>
            </slick>
          </section>

          {{-- Collections --}}
            <section>
              <h1 class="section_title" style="margin-left: 0;">Top Collections</h1>
              <slick settings="slickConfig2" 
                lazy-load="ondemand" 
                prev-arrow=".slick-prev" 
                next-arrow=".slick-next"
                class="tops-shots-slider"
                >
              <!-- Shot Template -->
              <div class="mdl-card md-whiteframe-4dp" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
                  <!-- Figure -->
                  <figure style="height: 200px;">
                      <a class="mt-grid___link" ng-click="open(shot.name)">
                          <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                              <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                          </div>
                      </a>
                  </figure>
                </div>
              </slick>
            </section>

          <section>
            <h1 class="section_title">Ankara</h1>
            <slick settings="slickConfig2" 
              lazy-load="ondemand" 
              prev-arrow=".slick-prev" 
              next-arrow=".slick-next"
              class="tops-shots-slider"
              >
            <!-- Shot Template -->
            <div class="mdl-card md-whiteframe-4dp top-shots-item" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
                <!-- Figure -->
                <figure style="height: 346px;">
                    <a class="mt-grid___link" ng-click="open(shot.name)">
                        <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                            <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                        </div>
                    </a>
                </figure>
              </div>
            </slick>
          </section>

          {{-- Designers --}}
          <section>
            <h1 class="section_title">Top Designers</h1>
            <slick settings="slickConfig2" 
              lazy-load="ondemand" 
              prev-arrow=".slick-prev" 
              next-arrow=".slick-next"
              class="tops-shots-slider"
              >
            <!-- Shot Template -->
            <div class="mdl-card md-whiteframe-4dp top-shots-item" itemprop="mainEntity" ng-repeat="shot in [1,2,3,4,5,6,7,8,9,10,11,12]">
                <!-- Figure -->
                <figure style="height: 346px;">
                    <a class="mt-grid___link" ng-click="open(shot.name)">
                        <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                            <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                        </div>
                    </a>
                </figure>
              </div>
            </slick>
          </section>
  </div>
</section>


@section('page_scripts')

          <!-- RS5.0 Core JS Files -->
          <script type="text/javascript" src="{{theme('vendor/revolution/js/jquery.themepunch.tools.min.js?rev=5.0')}}"></script>
          <script type="text/javascript" src="{{theme('vendor/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0')}}"></script>

          <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
          (Load Extensions only on Local File Systems !  +
          The following part can be removed on Server for On Demand Loading) -->  
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script type="text/javascript" src="{{theme('vendor/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
                <script type="text/javascript">
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

        </script>
@endsection