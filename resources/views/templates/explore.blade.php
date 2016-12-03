
@section('bg', 'grey60')
@section('header_type', 'just-main')

@section('page_styles')

  <!-- RS5.0 Main Stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/settings.css')}}">
   
  <!-- RS5.0 Layers and Navigation Styles -->
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/layers.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/css/navigation.css')}}">

  <!-- LOADING FONTS AND ICONS -->
  <link href="http://fonts.googleapis.com/css?family=Raleway:300,900,100,600,400" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
  
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('vendor/revolution/fonts/font-awesome/css/font-awesome.min.css')}}">

@endsection
<section class="hero md-whiteframe-4dp" style="margin-top:0px;">
    <div class="cover-container">
        <div class="hero-viewport">
            @include('layouts.template.frontend.partials.slider')
        </div>
    </div>
</section>

<section class="mt-row">
  <div class="mdl-card__title" style="color: rgba(0, 0, 0, 0.66);">
	 <h1 class="mdl-card__title-text">Instagram</h1>
  </div>
  <div class="mdl-grid">
  	<!-- Shot Template -->
	<div class="mdl-cell mdl-cell--4-col mdl-card mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="n in [42, 42, 43, 43, 33, 25] track by $index">
        <!-- The header -->
          <header class="mt-shot-header clearfix">
            <section>
              <span class="time">@{{shot.time}}</span>
              <span class="mdl-layout-spacer"></span>
              <a href="/profile/1" class="mt-shot-avatar" title="@{{shot.owner.username}}">
                 <h2 class="mt-avatar-name">@{{shot.owner.username}}</h2>
                  <img height="30" width="30" ng-src="/uploads/profiles/@{{shot.owner.avatar.avatar_small}}" alt="">
              </a>
            </section>
          </header>
          {{-- Figure --}}
          <figure>
            <a href="" class="mt-grid___link" ng-click="open(shot.name)">
                <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                    <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                </div>
            </a>
          </figure>

          <div class="mdl-card__actions">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round">
                  <i class="mdi mdi-heart icon-center"></i>
                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
              </button>
              <span style="font-size: 13px;margin: 0;"></span>
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round">
                  <i class="mdi mdi-comment icon-center"></i>
                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
              </button>
              <span style="font-size: 13px;margin: 0;"></span>
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round">
                  <i class="mdi mdi-eye icon-center"></i>
              </button>
              <span style="font-size: 13px;margin: 0;">@{{shot.views}}</span>
              <span class="mdl-layout-spacer"></span>
              <button id="card-right-button" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="icon-center mdi mdi-dots-vertical"></i>
             </button>
    	</div>
	  </div>

	</div> <!-- Grid ends -->
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
        
@endsection