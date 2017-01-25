
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

@endsection
<section class="hero md-whiteframe-4dp" style="margin-top:0px;">
    <div class="cover-container">
        <div class="hero-viewport">
            @include('layouts.template.frontend.partials.sliders.video')
        </div>
    </div>
</section>
<section>
  <div class="mdl-grid mdl-grid--no-spacing">
        {{-- Explore Items Here --}}
        <div class="mdl-cell mdl-cell--3-col explore-item">
          <figure style="background-image:url('https://s-media-cache-ak0.pinimg.com/564x/e9/45/b5/e945b5affb8a8de41df35c6957329d3d.jpg');">
              <a href="/categories/men">
                  <figcaption>
                    <h3>Men</h3>
                    <p>Explore latest dresses for  that will make you go crazy, i mean you def omg.</p>
                  </figcaption>
            </a>
            </figure>
        </div>
        <div class="mdl-cell mdl-cell--3-col explore-item">
          <figure style="background-image:url('https://s-media-cache-ak0.pinimg.com/564x/87/d4/e9/87d4e99fcac3500713c47e7fb542bbf8.jpg');">
              <a href="/explore/ankara">
                  <figcaption>
                    <h3>Ankara</h3>
                    <p>Explore latest dresses you go crazy, i mean you def need to wear this one omg.</p>
                  </figcaption>
            </a>
            </figure>
        </div>
        <div class="mdl-cell mdl-cell--6-col explore-item">
          <figure style="background-image:url('https://static1.squarespace.com/static/5346bdbae4b0b4931a2ab884/t/57fa865ae58c6208093d3e29/1476036188467/tash+and+cody.jpeg?format=1500w');">
              <a href="/categories/women">
                  <figcaption>
                    <h3>Women</h3>
                    <p>Explore latest dresses for women ankara prints that will make you go crazy, i mean you def need to wear this one omg.</p>
                  </figcaption>
            </a>
            </figure>
        </div>
        <div class="mdl-cell mdl-cell--6-col explore-item">
          <figure style="background-image:url('https://static1.squarespace.com/static/5346bdbae4b0b4931a2ab884/t/57fa865ae58c6208093d3e29/1476036188467/tash+and+cody.jpeg?format=1500w');">
              <a href="#">
                  <figcaption>
                    <h3>Women</h3>
                    <p>Explore latest dresses for women ankara prints that will make you go crazy, i mean you def need to wear this one omg.</p>
                  </figcaption>
            </a>
            </figure>
        </div>
        <div class="mdl-cell mdl-cell--3-col explore-item">
          <figure style="background-image:url('https://s-media-cache-ak0.pinimg.com/564x/2f/fd/90/2ffd904eba627e28222af614b1c184ef.jpg');">
              <a href="/categories/accessories">
                  <figcaption>
                    <h3>Accessories</h3>
                    <p>Explore latest dresses for  that will make you go crazy, i mean you def omg.</p>
                  </figcaption>
            </a>
            </figure>
        </div>
        <div class="mdl-cell mdl-cell--3-col explore-item">
          <figure style="background-image:url('https://s3.amazonaws.com/mytailor-v1/uploads/shots/original/b8/c6/c8/mt_b8c6c84e06c348a5b30780e24371ef87.jpg');">
              <a href="/categories/couples">
                  <figcaption>
                    <h3>Couples</h3>
                    <p>Explore latest dresses you go crazy, i mean you def need to wear this one omg.</p>
                  </figcaption>
            </a>
            </figure>
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