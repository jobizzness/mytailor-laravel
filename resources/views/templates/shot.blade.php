
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('bg', 'grey60')

{{--Content Area for our view--}}

@section('main')
	<div class="overlay-wrapper animated fadeIn">

	<section class="mdl-cell mdl-cell--12-col mdl-shadow--2dp mt-shot-wrapper" itemprop="mainEntity">

	<!-- The header -->
		<header class="mt-shot-header clearfix">
			<section class="mt-shot-actions">
				<div class="mt-shot-actions-back-btn">
					<a href="/shots" title="Shots">
						<i class="mt-back-btn"></i>
					</a>
				</div>
			</section>
            <section class="mt-shot-avatar-wrapper">
	            <a href="#" class="mt-shot-avatar" title="Mytailor">
	            	 <h2 class="mt-avatar-name">{{$shot->publishable->profile->username}}</h2>
	                <img height="30" width="30" ng-src="/uploads/profiles/{{$shot->publishable->profile->avatar}}" alt="Braden Hamm">
	            </a>
            </section>
        </header>

         <!-- The Figure -->
		<figure class="mt-figure__card mdl-card shot-cover">
			<img itemprop="image" itemscope itemtype="http://schema.org/primaryImageOfPage" ng-src="/uploads/{{$shot->file_name}}" alt="{{$shot->publishable->profile->username}}'s photo on myailorafrica.com">
		</figure>

		<!-- Notes -->
		<div class="shot-info">
			<div class="shot-title" style="padding: 1em 0;">
				<a href="#">{{$shot->title}}</a>
				<p class="shot-date">{{'@'.$shot->date}}</p>
			</div>

			<div class="shot-description">
				<p>{{$shot->description}}</p>
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
			<!-- All comments -->
			<div class="mt-shot-comments-wrapper scroller hidden">

				<div class="mt-shot-comment-cont"></div>

			</div>

			<!-- Comment Form -->
			<div class="comment-form-wrapper">
				<div class="input-comment">
					<input class="form-control" name="body" type="text" placeholder="Write your comment here ...">
				</div>
			</div>

			{{-- Coments --}}

			<section>
				<div>
				<details>
					<summary style="padding:1em;">3 comments</summary>
					<ul class="comments-list">
					  <li class="comment-list__item card">
						  <span class="circle">
							  <img src="http://bigbeehive.com/demo/orientplay-angular/img/user/vector4.png" alt="user"> 
						  </span>
						  <span class="title"> 
							  <a href="#">Abbey Christensen</a> <time> 5:09 PM</time> 
								<p>Can’t wait to see this movie.</p>
						  </span>
{{-- 						  <ul class="actions" href="#">
								<li><a class="reply" href="#">Reply</a></li>
						  </ul> --}}
					  </li>
					<li class="comment-list__item card">
					  <span class="circle">
						  <img src="http://bigbeehive.com/demo/orientplay-angular/img/user/vector2.png" alt="user"> 
					  </span>
					  <span class="title"> 
						  <a href="#">Ali Connors</a> <time> 5:15 PM</time> 
							<p>Mee too.</p>
					  </span>
					  <ul class="actions" href="#">
							<li><a class="reply" href="#">Reply</a></li>
					  </ul>
				  	</li>	
					<li class="comment-list__item card">
					  <span class="circle">
						  <img src="http://bigbeehive.com/demo/orientplay-angular/img/user/vector3.png" alt="user"> 
					  </span>
					  <span class="title"> 
						  <a href="#">Peter Carlsson</a> <time> 5:30 PM</time> 
							<p><a href="#">Abbey Christensen</a> I thought it was a good movie. The slow motion was a tad excessive at times, but overall it was good! I'm love it ;) </p>
					  </span>
					  <ul class="actions" href="#">
							<li><a class="reply" href="#">Reply</a></li>
					  </ul>
					</li>	
				  </ul> 
				</details>

				{{-- Last Comment --}}
				<ul id="lastComment" class="comments-list">
					<li class="comment-list__item card">
					    <span class="circle">
						  <img src="http://bigbeehive.com/demo/orientplay-angular/img/user/vector4.png" alt="user"> 
					    </span>
					  	<main>
						  <span class="title"> 
							  <a href="#">Sandra Adams </a> <time> 6:00 PM</time>
							  	<ul class="list-inline actions" href="#">
									<li><a class="edit" href="#" title="Edit comment">Edit</a></li>
									<li class="roff"><a class="delete" href="#" title="Delete comment"></a></li>
								</ul> 
							  	<p><a href="#">Peter Carlsson</a> This is without doubt the greatest flim i’ve ever seen.</p>
						  </span>
						</main>
				  	</li>

				</ul>
				
			</div>
			</section>
		</div>
	</section>

		<div class="mt-heading-light-bold">
			<h1>Related Shots</h1>
		</div>

	<section class="mdl-cell mdl-cell--12-col" style="display: flex;">

			<div class="mdl-cell mdl-cell--12-col pad-1 mdl-grid" ng-controller="shotsController">
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

	</section>

</div>
@endsection