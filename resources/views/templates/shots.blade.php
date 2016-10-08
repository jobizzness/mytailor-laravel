@section('bg', 'grey60')

@include('layouts.template.frontend.partials.secondary_header')


<section class="mt-grid clearfix grid" id="grid" infinite-scroll="updateShots('shots')" infinite-scroll-disabled='busy' infinite-scroll-distance="4" ng-cloak infinite-scroll-container='".mdl-layout__content"'>

<div angular-grid="shots">
{{--   @forelse($shots as $shot) --}}

    <div class="grid-item mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in shots">

        <!-- The header -->
          <header class="mt-shot-header clearfix">
            <section class="mt-shot-avatar-wrapper">
              <a href="#" class="mt-shot-avatar" title="Mytailor">
                 <h2 class="mt-avatar-name">@{{shot.publishable.profile.username}}</h2>
                  <img height="30" width="30" ng-src="/uploads/profiles/@{{shot.publishable.profile.avatar}}" alt="">
              </a>
            </section>
          </header>
          <figure>
            <a href="" class="mt-grid___link" ng-click="open(shot.file_name)">
                <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                    <img itemprop="image" ng-src="/uploads/@{{shot.file_name}}" alt="@{{shot.alt}}">
                </div>
            </a>
          </figure>
          <div class="mdl-card__actions mdl-card--border" style="position: relative;">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round" style="float: none;">
                  <i class="mdi mdi-heart-outline icon-center" style="font-size: 1.2em;color: #F23054;"></i>
                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
              </button>
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round" style="float: none;">
                  <i class="mdi mdi-comment icon-center" style="font-size: 1.2em;"></i>
                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
              </button>
              <span class="designer_card__views">
                  <i class="mdi mdi-eye"></i>
                  <span style="font-size: 12px;">@{{shot.views}} views</span>
              </span>
              <button id="card-right-button" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="icon-center mdi mdi-dots-vertical"></i>
             </button>
          </div>
    </div>
    
  </div>

    <section class="mt-load-more-wrapper" ng-show='busy'>
          <div class="mt-load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
    </section>
{{--     @empty

    <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>


  @endforelse


{!! $shots->appends(['cat'=>$cat])->render() !!} --}}

</section>


{{-- Post Shot Button --}}
@if($user)

  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-button--floating-action" ng-click="showShotPoster()">
    <i class="mdi mdi-camera"></i>
  </button>

@endif