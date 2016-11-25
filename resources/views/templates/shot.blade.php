
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('bg', 'grey60')
@section('header_type', 'just-main')

{{--Content Area for our view--}}

@section('main')
	<div class="overlay-wrapper animated fadeIn">

	<section class="mdl-cell mt-shot mdl-cell--12-col mdl-shadow--2dp mt-shot-wrapper" itemprop="mainEntity">

        <!-- The header -->
		<header class="mt-shot-header clearfix">
            <section>
              <span class="time">6h</span>
              <span class="mdl-layout-spacer"></span>
              <a href="#" class="mt-shot-avatar" title="{{$shot->publishable->present()->displayName()}}">
                 <h2 class="mt-avatar-name">{{$shot->publishable->present()->displayName()}}</h2>
                  <img height="30" width="30" ng-src="/uploads/profiles/{{$shot->publishable->profile->avatar}}" alt="">
              </a>
            </section>
         </header>

         <!-- The Figure -->
		<figure class="mt-figure__card mdl-card shot-cover">
			<img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" src="{{$shot->image->original}}" alt="{{str_replace(' ', '-', $shot->alt)}}">
		</figure>

 		<!-- Notes -->
		<div class="shot-info">

			{{-- Description --}}
			<div class="shot-description">
				<p>{{$shot->description}}</p>
			</div>

			<div class="mdl-card__actions" style="padding:0">
	              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round">
	                  <i class="mdi mdi-heart icon-center"></i>
	                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
	              </button>
	              <span style="font-size: 13px;margin: 0;">33</span>
	              <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round">
	                  <i class="mdi mdi-comment icon-center"></i>
	                  <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
	              </button>
	              <span style="font-size: 13px;margin: 0;">7</span>
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

		<!--  -->
		</section>
	</div>



</div>
@endsection