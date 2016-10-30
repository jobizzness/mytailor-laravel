
@section('bg', 'grey60')
@section('header_type', 'just-main')


{{-- 	<section class="pad-1">
		<div class="mdl-grid mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
            <div class="mdl-card__media mdl-cell mdl-cell--12-col-tablet card-media">
                <img class="article-image" src="https://s3.amazonaws.com/mytailor-v1/uploads/images/covers/collections/{{str_replace(' ', '-', $collection->slug).'/'.str_replace(' ', '-', $collection->slug)}}.png" border="0" alt="">
            </div>
            <div class="mdl-cell mdl-cell--8-col">
                <h2 class="mdl-card__title-text padding-top">{{ucfirst($collection->slug)}}</h2>
                <div class="mdl-card__supporting-text padding-top">
                    <span>Posted {{$collection->published_at->diffForHumans()}}</span>
				  <div class="mdl-card__menu">
				    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
				      <i class="mdi mdi-share-variant"></i>
				    </button>
				  </div>
                </div>
                <div class="mdl-card__supporting-text no-left-padding">
                    <p style="padding-bottom: 16px;">{{$collection->description}}</p>
                    <span>Category: <a href="#">Latest</a></span>
                </div>
            </div>
        </div>
	</section> --}}


<section class="mt-grid clearfix grid" id="grid" infinite-scroll="updateShots('{{$resource}}')" infinite-scroll-disabled='busy' infinite-scroll-distance="5" ng-cloak infinite-scroll-container='".mdl-layout__content"' ng-cloak>

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
            <a href="" class="mt-grid___link" ng-click="open(shot.name)">
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