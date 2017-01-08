
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
            @include('layouts.template.frontend.partials.sliders.brand_hero')
        </div>
    </div>
</section>


	{{-- Features --}}
    <section class="mt-row">
          <section class="mt-call-actions mdl-grid">

              <div class="mt-call-items mdl-cell mdl-cell--3-col wow bounceIn" href="#" title="Analysis">
                  <div class="call-item">
                    <div class="landing__inline-item-icon">
			            <i class="mdi mdi-trending-up"></i>
			          </div>
                    <div class="mt-call-items-title">Analysis</div>
                    <div class="mt-call-items-text">Understand your customers in detail. See what they respond to.</div>
                  </div>
              </div>


              <div class="mt-call-items mdl-cell mdl-cell--3-col wow bounceIn" href="#" title="Exposure">
                  <div class="call-item">
                    <div class="landing__inline-item-icon">
			            <i class="mdi mdi-eye"></i>
			          </div>
                    <div class="mt-call-items-title">Exposure</div>
                    <div class="mt-call-items-text">Get the right audience you need. Place your products to buyers.</div>
                  </div>
              </div>

                <div class="mt-call-items mdl-cell mdl-cell--3-col wow bounceIn" href="#" title="Community">
                  <div class="call-item">
                    <div class="landing__inline-item-icon">
			            <i class="mdi mdi-account-multiple"></i>
			          </div>
                    <div class="mt-call-items-title">Community</div>
                    <div class="mt-call-items-text">Meet users who are just as excited about your products.</div>
                  </div>
              </div>

                 <div class="mt-call-items mdl-cell mdl-cell--3-col wow bounceIn" href="#" title="Support">
                  <div class="call-item">
                    <div class="landing__inline-item-icon">
			            <i class="mdi mdi-phone-incoming"></i>
			          </div>
                    <div class="mt-call-items-title">Support</div>
                    <div class="mt-call-items-text">Easyily reach out to customers when they need you.</div>
                  </div>
              </div>

            <div style="clear: both;"></div>
          </section>

      </section> <!-- Call actions end -->

      <section class="mdl-grid mdl-grid--no-spacing">
      	<div class="mdl-cell mdl-cell--8-col">
			<div style="background-image:url(https://a0.muscache.com/airbnb/static/business_travel/traveler_landing/group-meeting-987cee7489652f5315fbca1ac36d0f1c.jpg);"></div>
      	</div>
      	<div class="mdl-cell mdl-cell--4-col dark pad-1">
  			<div class="mdl-card__title">
  				<h2 class="mdl-card__title-text"><span>Ideal for any type of business trip</span></h2>
  			</div>
      		<div class="mdl-card__supporting-text">
      			<h4>Extended stays</h4>
      			<p><span>Wake up in a real home so you can begin your day in a familiar way, helping you stay focused on long trips.</span><span> </span>
      			</p>
      		</div>
      		<div class="mdl-card__supporting-text">
      			<h4>Offsites and retreats</h4>
      			<p><span>Book a space that inspires you and your team to collaborate better, whether it’s for a day or an entire week.</span><span> </span></p>
      		</div>
      		<div class="mdl-card__supporting-text">
      			<h4>Group trips</h4>
      			<p><span>Choose a large home, a villa, or a multi-story condo so your whole team can stay comfortably under one roof.</span><span> </span></p>
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
					var tpj=jQuery;					
					var revapi100;
					tpj(document).ready(function() {
						if(tpj("#rev_slider_100_1").revolution == undefined){
							revslider_showDoubleJqueryError("#rev_slider_100_1");
						}else{
							revapi100 = tpj("#rev_slider_100_1").show().revolution({
								sliderType:"hero",
								jsFileLocation:"../../revolution/js/",
								sliderLayout:"fullwidth",
								dottedOverlay:"none",
								delay:9000,
								navigation: {
								},
								responsiveLevels:[1240,1024,778,480],
								gridwidth:[1240,1024,778,480],
								gridheight:[521,500,400,300],
								lazyType:"none",
								parallax: {
									type:"mouse",
									origo:"slidercenter",
									speed:2000,
									levels:[2,3,4,5,6,7,12,16,10,50],
								},
								shadow:0,
								spinner:"off",
								autoHeight:"off",
								disableProgressBar:"on",
								hideThumbsOnMobile:"off",
								hideSliderAtLimit:0,
								hideCaptionAtLimit:0,
								hideAllCaptionAtLilmit:0,
								debugMode:false,
								fallbacks: {
									simplifyAll:"off",
									disableFocusListener:false,
								}
							});
						}
					});	/*ready*/
				</script>

@endsection