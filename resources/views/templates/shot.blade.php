
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('bg', 'grey60')
@section('header_type', 'just-main')

{{--Content Area for our view--}}

@section('main')
	<div class="overlay-wrapper animated fadeIn">

	<section class="mdl-cell mt-shot mdl-cell--12-col mdl-shadow--2dp mt-shot-wrapper" itemprop="mainEntity" ng-cloak>

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
			<a href="{{$shot->source_url}}"><img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" src="{{$shot->image->original}}" alt="{{str_replace(' ', '-', $shot->alt)}}"></a>
		</figure>

 		<!-- Notes -->
		<div class="shot-info">

			{{-- Description --}}
			<div class="shot-description">
				<p>{{$shot->description}}</p>
			</div>

			<div class="mdl-card__actions" style="padding:0">
              <a ng-click="like(shot.name)" class="material-icons mdl-badge mdl-badge--overlap like-btn2" ng-class="{'red-color': shot.likes.is_liked}"><i class="mdi mdi-heart"></i><span class="count_text">@{{shot.likes.like_count}}</span></a>

              <a ng-click="" class="material-icons mdl-badge mdl-badge--overlap"><i class="mdi mdi-comment"></i><span class="count_text"></span></a>
	        </div>
	    </div>

		<!--  -->
		</section>
	</div>



</div>
@endsection