
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

<section class="mt-row" ng-repeat="section in sections">
  <div class="mdl-card__title" style="color: rgba(0, 0, 0, 0.66);">
	 <h1 class="mdl-card__title-text" style="text-transform: capitalize;color: #484848 !important;">@{{section.name}}</h1>
  </div>
  <div class="mdl-grid">
  	<!-- Shot Template -->
	<div class="mdl-cell mdl-cell--4-col mdl-card" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in section.shots.data">
        <!-- The header -->
{{--           <header class="mt-shot-header clearfix">
            <section>
              <span class="time">@{{shot.time}}</span>
              <span class="mdl-layout-spacer"></span>
              <a href="/profile/1" class="mt-shot-avatar" title="@{{shot.owner.username}}">
                 <h2 class="mt-avatar-name">@{{shot.owner.username}}</h2>
                  <img height="30" width="30" ng-src="/uploads/profiles/@{{shot.owner.avatar.avatar_small}}" alt="">
              </a>
            </section>
          </header> --}}
          {{-- Figure --}}
          <figure class="figure-overlay" style="max-height: 337px;overflow: hidden;">
              <a href="" class="mt-grid___link" ng-click="open(shot.name)">
                  <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                      <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                  </div>
              </a>
              <div class="entry-overlay__actions pad-1">
                <div class="mdl-card__actions">
                    <a href="#">
                        <i class="mdi mdi-heart-outline"></i>
                        <span style="font-size: 13px;margin: 0;">67</span>
                    </a>
                    <a href="#">
                        <i class="mdi mdi-comment-outline"></i>
                        <span style="font-size: 13px;margin: 0;">10</span>
                    </a>              
                </div>
                <div class="dimGradient"></div>
              </div>
          </figure>
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