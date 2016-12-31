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
<section class="pad-1" infinite-scroll="updateShots('{{$resource}}')" infinite-scroll-disabled='busy' infinite-scroll-distance="5" ng-cloak infinite-scroll-container='".mdl-layout__content"' ng-cloak>

<div angular-grid="shots" class="dynamic-grid" ag-grid-width="506" ag-gutter-size="10">
    <!-- Shot Template -->
    <div class="mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in shots" id="profile-shot">

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

          <!-- Notes -->
        <div class="shot-info">

            <!-- description -->
            <div class="shot-description">
              <p ng-bind="shot.description"></p>
            </div>

            <div class="mdl-card__actions" style="padding:0">
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
    
  </div>

</section>