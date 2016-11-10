
@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="pad-1">
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
              <span>Category: <a href="#">Women, Dresses, Latest</a></span>
          </div>
      </div>
  </div>
</section>