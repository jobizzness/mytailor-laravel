
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('bg', 'grey60')
@section('header_type', 'just-main')

{{--Content Area for our view--}}

@section('main')
	<div class="overlay-wrapper animated fadeIn">

	<section class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mt-shot-wrapper" itemprop="mainEntity">

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
		<figure class="mt-figure__card mdl-card shot-cover">
			<img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" src="{{$shot->image->original}}" alt="{{str_replace(' ', '-', $shot->alt)}}">
		</figure>

		<!-- Notes -->
		<div class="shot-info">
			<div class="shot-title" style="padding: 1em 0;">
				<a href="#">{{$shot->title}}</a>
			</div>

			<div class="shot-description">
				<p>{{$shot->description}}</p>
			</div>
		</div>

		<!--  -->
		<div class="mt-shots-info-wrap mt-card-light">
			<div class="mt-shot-info-head">
				<div class="mt-shot-user-actions-wrap">
					<ul class="mt-shot-user-actions">
						<li class="each-action">
							<a href="#" class="">
								<i class="mdi mdi-heart-outline" style="font-size: 2em;color: #F23054;"></i>
								<span>{{$shot->likes}}</span>
							</a>
						</li>
						<li class="each-action">
							<a>
								<i class="mdi mdi-eye" style="font-size: 2em;"></i>
								<span>{{$shot->views}}</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="mt-shot-utility-icons">
					<ul>
						<li class="util-list-surcelink m-0">
							<a class="btn mt-btn-circle m-0 waves-effect waves-button waves-float"  href="{{$shot->source_url}}" title="source URL">
	                              <i class="mdi mdi-link-variant"></i>
	                        </a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Comment Form -->
			<div class="comment-form-wrapper">
				<div class="input-comment">
					<form name="comment" class="comment-form" ui-keypress="{13:'like(id)'}" autocomplete="off">
						<input class="form-control" name="body" type="text" placeholder="Write your comment here ...">
					</form>
				</div>
			</div>

			{{-- Coments --}}

			<section>
				<div>
				<details>
					<summary style="padding:1em;">{{$shot->comments->count()}} comments</summary>
					<ul class="comments-list" ng-scrollbars ng-scrollbars-config="config">

						@forelse($shot->comments as $comment)
						  <li class="comment-list__item card">
							  <a href="#" class="mt-shot-avatar" title="Mytailor">
								    <span class="comment-avatar">
									  <img src="/uploads/profiles/{{$comment->publishable->profile->avatar}}" alt="{{$comment->publishable->profile->username}}"> 
								    </span>
							    </a>
							  	<main>
								  <span class="comment-list__title"> 
									  	<a href="#">{{$comment->publishable->profile->username}} </a> <span class="mdl-layout-spacer"></span>
									  	{{-- <ul class="list-inline actions" href="#">
											<li><a href="#"><i class="mdi mdi-pencil"></i></a></li>
										</ul> --}}
								  </span> 
									  	<p class="comment__text">{{$comment->body}} <time> 1 hr</time></p>
								</main>
					  	</li>
					  		@empty
					  	@endforelse

				  </ul> 
				</details>

				{{-- Last Comment --}}
				<ul id="lastComment" class="comments-list">

					<?php $comment = $shot->comments->last() ?: null ?>

					@if($comment)
						<li class="comment-list__item card">
						  	<a href="#" class="mt-shot-avatar" title="Mytailor">
							    <span class="comment-avatar">
								  <img src="/uploads/profiles/{{$comment->publishable->profile->avatar}}" alt="{{$comment->publishable->profile->username}}"> 
							    </span>
						    </a>
						  	<main>
							  	<span class="comment-list__title"> 
								  	<a href="#">{{$comment->publishable->profile->username}} </a> <span class="mdl-layout-spacer">	
								</span>
								  	{{-- <ul class="list-inline actions" href="#">
										<li><a href="#"><i class="mdi mdi-pencil"></i></a></li>
									</ul> --}}
							  	</span> 
								  	<p class="comment__text"><a href="#" class="tagged__name">Peter Carlsson</a> {{$comment->body}} <time> 1 hr</time></p>
							</main>
					  	</li>

				  	@endif	


				</ul>
			</div>
			</section>
		</div>
	</section>

{{-- 		<div class="mt-heading-light-bold">
			<h1>Related Shots</h1>
		</div>

	<section class="mdl-cell mdl-cell--12-col" style="display: flex;">

			<div class="mdl-cell mdl-cell--12-col pad-1 mdl-grid">
				@foreach($shot->related as $relate)
	              <div class="card mdl-cell mdl-cell--3-col mdl-shadow--2dp mdl-cell--4-col-phone" style="background:{{$relate->color}};">
	                <div class="mt__media-card">
	                  <a ng-click='open("{{$relate->file_name}}")'>
	                    <img src="/uploads/{{$relate->file_name}}">
	                  </a>
	                </div>
	                 <div class="mdl-card__actions mdl-card--border" style="position: relative;">

	                      <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round" style="float: none;">
	                          <i class="mdi mdi-heart-outline icon-center" style="font-size: 1.2em;color: #F23054;"></i>
	                          <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
	                      </button>
	                       <span style="font-size: 13px;"></span>

	                      <span class="designer_card__views">
	                          <i class="mdi mdi-eye"></i>
	                          <span style="font-size: 12px;">{{$relate->views}} views</span>
	                      </span>
	                      <button id="card-right-button"
							        class="mdl-button mdl-js-button mdl-button--icon">
							  <i class="icon-center mdi mdi-dots-vertical"></i>
						   </button>
	                  </div>
	              </div>
	             @endforeach
	          </div>

	</section> --}}

</div>
@endsection