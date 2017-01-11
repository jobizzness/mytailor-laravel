
{{-- Users Posts --}}
<section class="pad-1">

  <div class="mdl-grid"
          ng-init="updateShots()"
          ag-id="profile"
          ag-scroll-container=".mdl-layout__content" 
          ag-infinite-scroll="updateShots()">


    <!-- Shot Template -->
    <div class="mdl-cell mdl-cell--4-col mdl-card" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject" ng-repeat="shot in shots" ng-cloak>
        <!-- Figure -->
        <figure class="figure-overlay" style="max-height: 337px;overflow: hidden;">
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
                <span style="font-size: 13px;color: #fff;"></span>
            </a>              
        </div>
      </div>

  </div> <!-- Grid ends -->
      {{-- Loader --}}
          <div class="showbox" ng-show='busy'>
            <div class="loader">
              <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
              </svg>
            </div>
          </div>

</section>