@section('bg', 'grey60')
@section('page_styles')
    <link rel="stylesheet" href="{{theme('css/vendor/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{theme('css/vendor/slick-carousel/slick/slick-theme.css')}}">

@endsection
@section('sub_header')

    <nav class="mdl-navigation mt-nav-has-border">
        <a class="mdl-navigation__link red __active" href="">Local</a>
        <a class="mdl-navigation__link" href="">Most Viewed</a>
        <a class="mdl-navigation__link" href="">Favorites</a>
        <a class="mdl-navigation__link" href="">Showcase</a>
        <a class="mdl-navigation__link" href="">Latest</a>
    </nav>

@endsection

<!-- Main map section -->
<section class="mdl-shadow--2dp dark">
  <div map-lazy-load="https://maps.google.com/maps/api/js" map-lazy-load-params="@{{googleMapsUrl}}">
    <map center="current-location" zoom="10" class="designers-map" default-style="false" style="height: 450px;" styles="@{{mapStyles}}">
      <marker animation="DROP" position="current-location"></marker>
    </map>
  </div>
</section>

<div class="grid mt-row">
    
      <section class="mdl-grid" infinite-scroll="updateDesigners()" infinite-scroll-disabled='busy' infinite-scroll-distance="5" infinite-scroll-container='".mdl-layout__content"'>
        <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp designer-item" ng-repeat="designer in designers" ng-cloak>
            <!-- The header -->
            <header class="designer-item__header">
                  <a href="#" class="mt-shot-avatar" title="">
                      <img height="40" width="40" ng-src="/uploads/profiles/@{{designer.avatar.avatar_small}}" alt="">
                      <h2 class="mt-avatar-name bold_text">@{{designer.display_name}}</h2>
                      <span class="username">@@{{designer.username}}</span>
                  </a>
                  <p class="designer__location-text">Banjul, Gm</p>
             </header>

               <slick settings="slickConfig2" prev-arrow=".slick-prev" next-arrow=".slick-next">
                <!-- Shot Template -->
                  <div class="mdl-card" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in designer.shots">
                      <!-- Figure -->
                      <figure class="figure-overlay" style="height: 346px;overflow: hidden;">
                          <a href="" class="mt-grid___link" ng-click="open(shot.name)">
                              <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                                  <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
                              </div>
                          </a>
                            <div class="dimGradient"></div>
                      </figure>
                      {{-- Figure Actions --}}
                      <div class="mdl-card__actions floated_actions pad-1">
                          <p class="floated-actions_title">@{{shot.title}}</p>
                          <a href="#" style="margin-right: 15px;">
                              <i class="mdi mdi-heart-outline icon_rounded like-btn"></i>
                              <span style="font-size: 13px;color: #fff;">@{{shot.likes.like_count}}</span>
                          </a>
                          <a href="#">
                              <i class="mdi mdi-comment-outline icon_rounded comment-btn"></i>
                              <span style="font-size: 13px;color: #fff;">10</span>
                          </a>              
                      </div>
                    </div>
                </slick>
                {{-- Arrows --}}
                <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;"><span class="slider-buttons" data-reactid=".q5km6lna4g.0.2.0.0"><svg viewBox="0 0 18 18" data-reactid=".q5km6lna4g.0.2.0.0.0"><path d="M13.703 16.293a1 1 0 1 1-1.415 1.414l-7.995-8a1 1 0 0 1 0-1.414l7.995-8a1 1 0 1 1 1.415 1.414L6.413 9l7.29 7.293z" data-reactid=".q5km6lna4g.0.2.0.0.0.0"></path></svg></span></button>
                <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;"><span class="slider-buttons" data-reactid=".q5km6lna4g.0.3.0.0"><svg viewBox="0 0 18 18" data-reactid=".q5km6lna4g.0.3.0.0.0"><path d="M4.293 1.707A1 1 0 1 1 5.708.293l7.995 8a1 1 0 0 1 0 1.414l-7.995 8a1 1 0 1 1-1.415-1.414L11.583 9l-7.29-7.293z" data-reactid=".q5km6lna4g.0.3.0.0.0.0"></path></svg></span></button>
        </div>
      </section>

{{--       @forelse($designers as $designer)
    @empty
        <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>
    @endforelse --}}

</div>

@section('page_scripts')

@endsection