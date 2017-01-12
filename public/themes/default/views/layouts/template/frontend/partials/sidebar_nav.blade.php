<div class="mt-layout-sidebar" ng-class="{'__visible': toggle}">
    <header class="mt-layout-sidebar__users-info-wrapp">
        @if($user)
            <div class="mt-sidebar-avatar">
                <img src="{{$user->profile->avatar}}">
            </div>
              

              <div class="sidebar-title-wrapper">
                <span>{{'@'.$user->profile->username}}</span>
                <span class="mdl-layout-spacer"></span>
                <!-- Right aligned menu below button -->
                  <button id="menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                    <i class="mdi mdi-menu-down"></i>
                  </button>
                  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                      for="menu-lower-right">
                  <li class="mdl-menu__item"><a href="#" class="m-0">Profile</a></li>
                  <li class="mdl-menu__item"><a href="{{route('auth.logout')}}" class="m-0">Logout</a></li>
                  </ul>
              </div>
        @endif
    </header>

    <nav id="mt-nav-main" class="mt-nav" role="navigataion" itemscope itemtype="https://schema.org/WPSideBar">
                      
      <ul class="mt-sidebar-list">
          <li class="{{ Route::is('home.feed') || Route::is('shots.index') ? 'mt-list-active' : ''}}">
            <a href="/" class="mt-sidebar-link btn"><i class="mt-icon mdi mdi-home-variant"></i>Home</a>
          </li>
          <li class="{{ Route::is('explore.index')? 'mt-list-active' : ''}}">
            <a href="/explore" class="mt-sidebar-link btn"><i class="mdi mdi-compass"></i>Explore</a>
          </li>
          <li class="{{ Route::is('designers.index')? 'mt-list-active' : ''}}">
            <a href="/designers" class="mt-sidebar-link btn"><i class="mdi mdi-tshirt-v"></i>Designers</a>
          </li>
          <li class="{{ Route::is('brands.index')? 'mt-list-active' : ''}}">
            <a href="/brands" class="mt-sidebar-link btn"><i class="mdi mdi-medium"></i>Brands</a>
          </li>
          <li class="{{ Route::is('saves.index')? 'mt-list-active' : ''}}">
            <a href="/saves" class="mt-sidebar-link btn"><i class="mdi mdi-cloud-download"></i>Saves</a>
          </li>
          <li class="{{ Route::is('contact.index')? 'mt-list-active' : ''}}">
            <a href="/contact" class="mt-sidebar-link btn"><i class="mdi mdi-contact-mail"></i>Contact</a></li>
        </ul>           
    </nav>
</div> <!-- SideBar -->