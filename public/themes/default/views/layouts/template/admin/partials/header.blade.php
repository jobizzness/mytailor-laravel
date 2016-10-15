<header class="mdl-layout__header mdl-layout__header--waterfall mt-glow-soft @yield('header_type')" itemscope itemtype='https://schema.org/WPHeader'>

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

         @include('layouts.template.backend.partials.users.header-actions')

    </div>

    <!-- Secondary Navigation -->
{{--     <div class="mt-sub-header mdl-layout__header-row">
       @yield('sub_header')
    </div> --}}
</header>
