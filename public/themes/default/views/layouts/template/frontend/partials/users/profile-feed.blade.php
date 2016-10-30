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

<section class="mt-post-item mdl-shadow--2dp">

	<!-- The header -->
        <!-- The header -->
		<header class="mt-shot-header clearfix">
            <section>
              <span class="time">6h</span>
              <span class="mdl-layout-spacer"></span>
              <a href="#" class="mt-shot-avatar" title="Mytailor">
                 <h2 class="mt-avatar-name">{{$shot->publishable->present()->displayName()}}</h2>
                  <img height="30" width="30" ng-src="/uploads/profiles/{{$shot->publishable->profile->avatar}}" alt="">
              </a>
            </section>
         </header>

        <!-- The Figure -->
		<figure class="mt-figure__card mdl-card shot-cover --profile__feed">
			<a href=""><img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" src="/uploads/mt_4b1ad433bb542496a43784835e012175.jpg" alt="{{$shot->publishable->profile->username}}'s photo on myailorafrica.com"></a>
		</figure>

    <!-- Notes -->
    <div class="shot-info" style="padding: 1em 3em;min-height: 20px;background: #F8F8F8;">
      <div class="shot-title" style="padding: 1em 0;">
        <a href="#" ng-bind="shot.title"></a>
      </div>
      <div class="shot-description">
        <p ng-bind="shot.description">
        </p>
      </div>
    </div>

    <!-- Comments -->
    <div class="mt-shots-info-wrap mt-card-light">
    <div class="mt-shot-info-head">
      <div class="mt-shot-user-actions-wrap">
        <ul class="mt-shot-user-actions">
          <li class="each-action">
            <a href="#" class="">
              <i class="mdi mdi-heart-outline" style="font-size: 2em;color: #F23054;"></i>
              <span ng-bind="shot.likes"></span>
            </a>
          </li>
          <li class="each-action">
            <a>
              <i class="mdi mdi-eye" style="font-size: 2em;"></i>
              <span ng-bind="shot.views"></span>
            </a>
          </li>
        </ul>
      </div>
      <div class="mt-shot-utility-icons">
        <ul>
          <li class="util-list-surcelink m-0">
            <a class="btn mt-btn-circle m-0 waves-effect waves-button waves-float"  ng-href="@{{shot.source_url}}" title="source URL">
                              <i class="mdi mdi-link-variant"></i>
                        </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- All comments -->
    <div class="mt-shot-comments-wrapper scroller hidden">

      <div class="mt-shot-comment-cont"></div>

    </div>

    <!-- Comment Form -->
    <div class="comment-form-wrapper">
      <form action="" method="POST">
        <div class="input-comment">
          <input class="form-control" type="text" placeholder="Write your comment here ...">
        </div>
        
      </form>
    </div>

</section>
