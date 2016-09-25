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

    <div class="grid-item" itemprop="mainEntity" itemscope itemtype="http://schema.org/imageObject">
      <figure>
            <a href="" class="mt-grid___link" ng-click='open("{{$shot['file_name']}}")'>
                <div class="mt-image-holder" itemscope itemtype="http://schema.org/thumbnail">
                    <img itemprop="image" src="/uploads/{{$shot['file_name']}}" alt="{{$shot['alt']}}">
                </div>
                <div class="dimOverlay"></div>
                <figcaption>
                    <span><img src="{{theme('images/icons/search67.svg')}}"></span>
                </figcaption>
            </a>
      </figure>
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