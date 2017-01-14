
@section('bg', 'dark')
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

@endsection
<section class="hero md-whiteframe-4dp" style="margin-top:0px;">
    <div class="cover-container">
        <div class="hero-viewport">
            @include('layouts.template.frontend.partials.sliders.video')
        </div>
    </div>
</section>

<section class="mdl-grid">
  <main class="mdl-cell mdl-cell--8-col">
    @include('layouts.template.frontend.partials.explore-feed')
  </main>
  <div class="mdl-cell mdl-cell--4-col">
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect dark__tab">
        <div class="mdl-tabs__tab-bar tab__no-border">
            <a href="#starks-panel" class="mdl-tabs__tab is-active">Activity</a>
            <a href="#targaryens-panel" class="mdl-tabs__tab">People</a>
        </div>

        <div class="mdl-tabs__panel is-active" id="starks-panel">
          <ul class="demo-list-two mdl-list">
            <li class="mdl-list__item mdl-list__item--two-line" ng-repeat="n in [1,2,3,4,5]">
              <span class="mdl-list__item-primary-content">
                <i class="mdi mdl-list__item-avatar mdi-person"></i>
                <span>Bryan Cranston</span>
                <span class="mdl-list__item-sub-title">liked Jobizzness watumad's post</span>
              </span>
              <span class="mdl-list__item-secondary-content">
                3 min ago
              </span>
            </li>
          </ul>
        </div>
        <div class="mdl-tabs__panel" id="targaryens-panel">
          <ul class="demo-list-two mdl-list">
            <li class="mdl-list__item mdl-list__item--two-line" ng-repeat="n in [1,2,3,4,5]">
              <span class="mdl-list__item-primary-content">
                <i class="mdi mdl-list__item-avatar mdi-person"></i>
                <span>Bryan Cranston</span>
                <span class="mdl-list__item-sub-title">liked Jobizzness watumad's post</span>
              </span>
              <span class="mdl-list__item-secondary-content">
                <button class="mdl-button mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">follow</button>
              </span>
            </li>
          </ul>
        </div>
      </div>
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