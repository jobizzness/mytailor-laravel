
@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="pad-1">
  <div class="mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
      <div class="mdl-card__media mdl-cell mdl-cell--12-col-tablet card-media">
          <div class="article-image" style="background-image:url('{{$collection->image}}')"></div>
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
              <p class="article__text" ng-bind-html="'{{addslashes($collection->description)}}' | linkfy:'_blank'"></p>
              <span>Category: <a href="#">Women, Dresses, Latest</a></span>
          </div>
      </div>
  </div>
</section>

  {{-- Shots --}}
  @include('layouts.template.frontend.partials.pages.shots-feed')