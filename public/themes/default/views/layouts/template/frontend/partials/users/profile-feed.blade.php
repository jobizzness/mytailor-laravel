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
		<header class="mt-shot-header clearfix">
			<section class="shot-time__wrap">
				<time> 1 hr</time>
			</section>

            <section class="mt-shot-avatar-wrapper">
	            <a href="#" class="mt-shot-avatar" title="Mytailor">
	            	 <h2 class="mt-avatar-name">{{$shot->publishable->present()->displayName()}}</h2>
	                <img height="30" width="30" src="/uploads/profiles/{{$shot->publishable->profile->avatar}}" alt="{{$shot->publishable->profile->username}}">
	            </a>
            </section>
        </header>

        <!-- The Figure -->
		<figure class="mt-figure__card mdl-card shot-cover --profile__feed">
			<a href=""><img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" src="/uploads/mt_4b1ad433bb542496a43784835e012175.jpg" alt="{{$shot->publishable->profile->username}}'s photo on myailorafrica.com"></a>
		</figure>

		{{-- Actions --}}
		<div class="mdl-card__actions mdl-card--border" style="position: relative;">

          <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round" style="float: none;">
              <i class="mdi mdi-heart-outline icon-center" style="font-size: 1.2em;color: #F23054;"></i>
              <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
          </button>
           <span style="font-size: 13px;"></span>

          <span class="designer_card__views">
              <i class="mdi mdi-eye"></i>
              <span style="font-size: 12px;">6k views</span>
          </span>
          <button id="card-right-button"
			        class="mdl-button mdl-js-button mdl-button--icon">
			  <i class="icon-center mdi mdi-dots-vertical"></i>
		   </button>
      </div>
</section>
