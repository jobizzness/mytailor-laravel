
@section('bg', 'grey60')

@section('sub_header')
    <div class="mdl-layout-spacer"></div>
    <nav class="mdl-navigation mt-nav-has-border" role="navigataion" itemscope itemtype="https://schema.org/SiteNavigationElement">
      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/latest')}}" href="{{URL::to('shots/latest')}}">Latest</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/trending')}}" href="{{URL::to('shots/trending')}}">Trending</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/featured')}}" href="{{URL::to('shots/featured')}}">Featured</a>
    </nav>

    <div class="mdl-layout-spacer"></div>

    <button id="top-menu-right"
        class="icon-round mdl-button mdl-js-button mdl-button--icon top-menu-right">
            <i class="icon-center mdi mdi-dots-vertical"></i>
    </button>

        <!-- Menu Right -->
   <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="top-menu-right" itemscope="itemscope" itemtype="http://www.schema.org/SiteNavigationElement">
      <li class="mdl-menu__item"><a href="?cat=ma" class="mt-menu__link">Men</a></li>
      <li class="mdl-menu__item"><a href="?cat=fm" class="mt-menu__link">Women</a></li>
      <li class="mdl-menu__item"><a href="?cat=ki" class="mt-menu__link">Kids</a></li>
      <li class="mdl-menu__item"><a href="?cat=cu" class="mt-menu__link">Couples</a></li>
      <li class="mdl-menu__item"><a href="?cat=ac" class="mt-menu__link">Accessories</a></li>
    </ul>

    <!-- Secondary Navigation -->
    @include('layouts.template.frontend.partials.secondary_header')

@endsection


  {{-- Shots --}}
  @include('layouts.template.frontend.partials.pages.shots-feed')