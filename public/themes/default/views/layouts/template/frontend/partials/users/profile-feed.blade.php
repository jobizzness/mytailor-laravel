
{{-- Users Posts --}}
<section class="pad-1" 
          ng-init="updateShots('{{$resource}}')"
          ag-id="shots"
          ag-scroll-container=".mdl-layout__content" 
          ag-infinite-scroll="updateShots('{{$resource}}')">

  <div class="mdl-grid">


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
                <span style="font-size: 13px;color: #fff;">67</span>
            </a>
            <a href="#">
                <i class="mdi mdi-comment-outline icon_rounded comment-btn"></i>
                <span style="font-size: 13px;color: #fff;">10</span>
            </a>              
        </div>
      </div>

  </div> <!-- Grid ends -->

</section>