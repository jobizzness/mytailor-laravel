@section('bg', 'grey60')

@include('layouts.template.frontend.partials.secondary_header')
<header class="mt-sub-header mdl-layout__header-row">

    <div class="mdl-layout-spacer"></div>

    <nav class="mdl-navigation mt-nav-has-border" role="navigataion" itemscope itemtype="https://schema.org/SiteNavigationElement">

        <a class="mdl-navigation__link {{ (Request::is('shots/latest') ? '__active' : '') }}" href="{{URL::to('shots/latest')}}">Latest</a>

        <a class="mdl-navigation__link {{ (Request::is('shots') || Request::is('shots/trending') || Request::is('/')? '__active' : '') }}" href="{{URL::to('shots/trending')}}">Trending</a>

        <a class="mdl-navigation__link {{ (Request::is('shots/featured') ? '__active' : '') }}" href="{{URL::to('shots/featured')}}">Featured</a>

    </nav>

    <div class="mdl-layout-spacer"></div>

    <button id="top-menu-right"
        class="icon-round mdl-button mdl-js-button mdl-button--icon top-menu-right">
            <i class="icon-center mdi mdi-dots-vertical"></i>
    </button>

   <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="top-menu-right" itemscope="itemscope" itemtype="http://www.schema.org/SiteNavigationElement">
      <li class="mdl-menu__item"><a href="?cat=ma" class="mt-menu__link">Men</a></li>
      <li class="mdl-menu__item"><a href="?cat=fm" class="mt-menu__link">Women</a></li>
      <li class="mdl-menu__item"><a href="?cat=ki" class="mt-menu__link">Kids</a></li>
      <li class="mdl-menu__item"><a href="?cat=cu" class="mt-menu__link">Couples</a></li>
      <li class="mdl-menu__item"><a href="?cat=ac" class="mt-menu__link">Accessories</a></li>
    </ul>

</header>

<section class="mt-grid clearfix grid" id="grid" ng-controller="shotsController" ng-init="init()">


  @forelse($shots as $shot)

    <div class="grid-item mdl-shadow--2dp mt-shot" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject">

        <!-- The header -->
          <header class="mt-shot-header clearfix">
            <section class="mt-shot-avatar-wrapper">
              <a href="#" class="mt-shot-avatar" title="Mytailor">
                 <h2 class="mt-avatar-name">{{-- {{$shot->publishable->present()->displayName()}} --}}MyTailor Africa</h2>
                  <img height="30" width="30" src="/uploads/profiles/{{-- {{$shot->publishable->profile->avatar}} --}}MyTailor.png" alt="">
              </a>
            </section>
          </header>
          <figure>
            <a href="" class="mt-grid___link" ng-click='open("{{$shot->file_name}}")'>
                <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                    <img itemprop="image" src="http://mytailorafrica.com/uploads/{{$shot->file_name}}" alt="{{$shot->alt}}">
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
                  <span style="font-size: 12px;">{{$shot->views}} views</span>
              </span>
              <button id="card-right-button" class="mdl-button mdl-js-button mdl-button--icon">
                <i class="icon-center mdi mdi-dots-vertical"></i>
             </button>
          </div>
    </div>
    
    @empty

    <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>


  @endforelse


{!! $shots->appends(['cat'=>$cat])->render() !!}

</section>

{{-- Post Shot Button --}}
@if($user)

  <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-button--floating-action" ng-click="showShotPoster()">
    <i class="mdi mdi-camera"></i>
  </button>

@endif