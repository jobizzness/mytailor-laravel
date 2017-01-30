
@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="pad-1">
  <div class="mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
      <div class="mdl-card__media mdl-cell mdl-cell--12-col-tablet card-media">
          <img class="article-image" src="{{$collection->image}}" border="0" alt="">
      </div>
      <div class="mdl-cell mdl-cell--8-col">
          <div class="mdl-card__supporting-text padding-top">
              <span class="collection-time"><i class="mdi mdi-clock"></i> {{$collection->published_at->diffForHumans()}}</span>
              <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                  <i class="mdi mdi-share-variant"></i>
                </button>
              </div>
          </div>
          
          <h2 class="mdl-card__title-text padding-top" style="text-transform: capitalize;">{{$collection->title}}</h2>
          <div class="mdl-card__supporting-text no-left-padding">
              <p style="padding-bottom: 16px;" ng-bind-html="'{{$collection->description}}' | linkfy:'_blank'"></p>
              <span>Category: <a href="#">Women, Dresses, Latest</a></span>
          </div>
      </div>
  </div>
</section>

  {{-- Shots --}}
  @include('layouts.template.frontend.partials.pages.shots-feed')