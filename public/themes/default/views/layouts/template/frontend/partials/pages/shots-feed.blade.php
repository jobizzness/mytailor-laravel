<section class="pad-1" style="padding: 2em;">

<div  angular-grid="shots" 
      ng-init="updateShots('{{$resource}}')"
      ag-id="shots"
      ag-scroll-container=".mdl-layout__content" 
      ag-infinite-scroll="updateShots('{{$resource}}')"

    >
    <!-- Shot Template -->
    <div class="mt-shot card-shadow" itemscope itemtype="http://schema.org/Product" ng-repeat="shot in shots" ng-cloak>

        <!-- The header -->
          <header class="mt-shot-header clearfix">
            <section>
              <span class="time">@{{shot.time}}</span>
              <span class="mdl-layout-spacer"></span>
              <a href="/@{{shot.owner.username}}" 
                  class="mt-shot-avatar" 
                  title="@{{shot.owner.display_name}}"
                  itemprop="brand" itemscope itemtype="http://schema.org/Brand"
                  >
                 <h2 class="mt-avatar-name">@{{shot.owner.display_name}}</h2>
                 <img height="30" width="30" ng-src="@{{shot.owner.avatar.avatar_small}}" alt="">
              </a>
            </section>
          </header>
          {{-- Figure --}}
          <figure class="figure-overlay light">
            <a href="" class="mt-grid___link" ng-click="open(shot.name)" itemprop="url">
                <div class="mt-image-holder">
                    <img itemprop="image" ng-src="@{{shot.image.original}}" alt="@{{shot.alt}}" itemscope itemtype="http://schema.org/thumbnail">
                </div>
            </a>
          </figure>

          <!-- Notes -->
        <div style="padding: 10px">
            <!-- description -->
            <div class="shot-description">
              <p ng-bind-html="shot.title | linkfy:'_self'" itemprop="description"></p>
            </div>
            <div class="mdl-card__actions" style="padding:0">
              <a ng-click="like(shot.name)" class="material-icons mdl-badge mdl-badge--overlap like-btn2" ng-class="{'red-color': shot.likes.is_liked}"><i class="mdi mdi-heart"></i><span class="count_text">@{{shot.likes.like_count}}</span></a>

              <a ng-click="" class="material-icons mdl-badge mdl-badge--overlap"><i class="mdi mdi-comment"></i><span class="count_text"></span></a>
              <span class="mdl-layout-spacer"></span>

              {{-- Share --}}
              <a ng-click="like(shot.name)" class="material-icons mdl-badge mdl-badge--overlap like-btn2" ng-class="{'red-color': shot.likes.is_liked}"><i class="mdi mdi-share"></i><span class="count_text">@{{shot.likes.like_count}}</span></a>
            </div>
        </div>
    </div>
    
  </div>

    {{-- Loader --}}
          <div class="showbox" ng-show='busy' ng-cloak>
            <div class="loader">
              <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
              </svg>
            </div>
          </div>
    </section>

</section>