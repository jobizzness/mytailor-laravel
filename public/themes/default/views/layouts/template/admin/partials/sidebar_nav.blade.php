<div class="mt-layout-sidebar --scroll" ng-class="{'__visible': toggle}">
              <header class="mt-layout-sidebar__users-info-wrapp" style="background:#FB4164;">
                  <div class="mt-sidebar-avatar">
                    <img src="{{theme('images/profiles/11698517_10205466839968531_5750592294516276713_n.jpg')}}">

                    <div class="sidebar-title-wrapper">
                      <span></span>
                      <div class="mdl-layout-spacer"></div>
                      <!-- Right aligned menu below button -->
                        <button id="menu-lower-right"
                                class="mdl-button mdl-js-button mdl-button--icon">
                          <i class="mdi mdi-menu-down"></i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="menu-lower-right">
                        <li class="mdl-menu__item">Some Action</li>
                        <li class="mdl-menu__item"><a href="#" class="m-0">Profile</a></li>
                        <li class="mdl-menu__item"><a href="{{route('auth.logout')}}" class="m-0">Logout</a></li>
                        </ul>
                    </div>
                  </div>
              </header>
              <nav id="mt-nav-main" class="mt-nav" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                  <h1 class="hidden">Main Navigation</h1>
                  
                  <ul class="mt-sidebar-list">
            <li class="mt-list-active"><a href="{{route('admin.dashboard')}}" class="mt-sidebar-link btn"><i class="mt-icon mdi mdi-image-filter-tilt-shift"></i>Dashboard</a></li>
    <li><a href="{{route('admin.shots.index')}}" class="mt-sidebar-link btn"><i class="mdi mdi-image"></i>Shots</a></li>
    <li><a href="{{route('admin.blog.index')}}" class="mt-sidebar-link btn"><i class="mdi mdi-border-color"></i>Posts</a></li>
    <li><a href="#" class="mt-sidebar-link btn"><i class="mdi mdi-camera-iris"></i>Apps</a></li>
    <li><a href="#" class="mt-sidebar-link btn"><i class="mdi mdi-message-alert"></i>Responses</a></li>
    <li><a href="{{route('admin.users.index')}}" class="mt-sidebar-link btn"><i class="mdi mdi-account"></i>Users</a></li>
    <li><a href="{{route('admin.pages.index')}}" class="mt-sidebar-link btn"><i class="mdi mdi-book"></i>Pages</a></li>
    <li><a href="#" class="mt-sidebar-link btn"><i class="mdi mdi-settings"></i>Settings</a></li>
      </ul>           
              </nav>
</div> <!-- SideBar -->