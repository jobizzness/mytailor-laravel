<header class="mdl-layout__header mdl-layout__header--waterfall mt-glow-soft" itemscope itemtype='https://schema.org/WPHeader'>

    <div class="mt-global-header mdl-layout__header-row flex-center dark">
      <div ng-click="toggleSidebar()" class="mdl-layout__drawer-button pull-left"><i class="mdi mdi-menu"></i></div>
      <!-- Logo -->
        <div><h1><a href="http://www.mytailorafrica.com/"><span class="mt-logo__icon">MyTailorAfrica</span></a></h1></div>
        <!-- Search bar starts here -->
        <div class="mt-search-wrapper expandable--search hide-on-phone">
            <span class="icon-search"><i class="mdi mdi-magnify" style="font-size: 22px;"></i></span>
            <form method="Get" action="#" id="search-box">
            <input autocapitalize="off" autocomplete="off" autocorrect="off" placeholder="search for items like men, women, shirts, shoes and more ..." role="textbox" spellcheck="false" type="text"></form>
        </div>
        <button class="icon-round mdl-button mt-toggle-search" style="visibility:hidden;">
            <i class="mdi mdi-magnify icon-center" data-type="search"></i>
        </button>
    </div>

    <!-- Secondary Navigation -->
    <div class="mt-sub-header mdl-layout__header-row mt-glow-soft">

        {{-- <div class="mdl-layout-spacer"></div>

        <nav class="mdl-navigation mt-nav-has-border" role="navigataion" itemscope itemtype="https://schema.org/SiteNavigationElement"> --}}

           {{--  <a class="mdl-navigation__link {{ (Request::is('shots/latest') ? '__active' : '') }}" href="{{URL::to('shots/latest')}}">Latest</a>

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
        </ul> --}}

    </div>
</header>
