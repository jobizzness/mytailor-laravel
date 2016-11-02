{{--Box that tells you to post something on their wall --}}

<section class="poster-card mdl-shadow--2dp">
	<div style="width:100%;">
		<div class="mt-post--object flex-center">
			<h1 id="ngdialog1-aria-labelledby">Drag &amp; drop photos or </h1> 
			<!-- Colored FAB button with ripple -->
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
			  Upload
			</button>
		</div>
	</div>
</section>

{{-- Users Posts --}}
<section class="mt-grid clearfix grid" id="grid"
          infinite-scroll="updateShots('{{$resource}}')"
          infinite-scroll-disabled='busy'
          infinite-scroll-distance="5"
          infinite-scroll-container='".mdl-layout__content"'
          ng-cloak>

  <div angular-grid="shots">
      <!-- Shot Template -->
      <div class="grid-item mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in shots">

          <!-- The header -->
            <header class="mt-shot-header clearfix">
              <section>
                <span class="time">@{{shot.time}}</span>
                <span class="mdl-layout-spacer"></span>
                <a href="#" class="mt-shot-avatar" title="Mytailor">
                   <h2 class="mt-avatar-name">@{{shot.owner.username}}</h2>
                    <img height="30" width="30" ng-src="/uploads/profiles/@{{shot.owner.avatar.avatar_small}}" alt="">
                </a>
              </section>
            </header>
            <figure>
              <a href="" class="mt-grid___link" ng-click="open('@{{shot.name}}')">
                  <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                      <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}">
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

    {{-- Loader --}}
    <section class="mt-load-more-wrapper" ng-show='busy'>
          <div class="mt-load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
    </section>

</section>