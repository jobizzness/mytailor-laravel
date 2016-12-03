<section class="pad-1" infinite-scroll="updateShots('{{$resource}}')" infinite-scroll-disabled='busy' infinite-scroll-distance="5" ng-cloak infinite-scroll-container='".mdl-layout__content"' ng-cloak>

<div angular-grid="shots">
    <!-- Shot Template -->
    <div class="mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in shots">

        <!-- The header -->
          <header class="mt-shot-header clearfix">
            <section>
              <span class="time">@{{shot.time}}</span>
              <span class="mdl-layout-spacer"></span>
              <a href="/@{{shot.owner.username}}" class="mt-shot-avatar" title="@{{shot.owner.display_name}}">
                 <h2 class="mt-avatar-name">@{{shot.owner.display_name}}</h2>
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
    
  </div>

    {{-- Loader --}}
    <section class="mt-load-more-wrapper" ng-show='busy'>
          <div class="mt-load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
    </section>

</section>