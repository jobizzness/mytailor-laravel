 {{-- Notification area and avatar --}}
                <div class="mt-top-menu">
                  <ul class="user-actions flex-center">
                  <!-- Notification Icon and Dropdown -->
                  
                  <li style="margin-top: -10px;">
                      <a href="/saves" title="saves">
                        <div class="material-icons mdl-badge mdl-badge--overlap" ><i class="mdi mdi-arrow-down-bold-circle"></i></div>
                      </a>
                    </li>
                  <li style="margin-top: -10px;">
                      <a href="/explore" title="explore">
                        <div class="material-icons mdl-badge mdl-badge--overlap" ><i class="mdi mdi-crosshairs-gps"></i></div>
                      </a>
                    </li>
                    <li style="margin-top: -10px;">
                      <a href="#" id="notifications">
                        <div class="material-icons mdl-badge mdl-badge--overlap" ><i class="mdi mdi-bell"></i></div>
                      </a>
                        {{-- Followers dropdown --}}
                        <ul class="mdl-menu mt-drop__menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="notifications">
                          <li class="mt-dropmenu__header">NOTIFICATIONS</li>
                          <li class="mt-dropmenu__items" id="list">
                          {{-- Drop Items here --}}
                              <ul class="demo-list-three mdl-list" ng-scrollbars ng-scrollbars-config="config">
                                <li class="mdl-list__item mdl-list__item--three-line">
                                  <a href="#">
                                      <span class="mdl-list__item-primary-content">
                                          <img class="mdl-list__item-avatar" src="" />
                                          <span>Bob Odenkirk</span>
                                          <span class="mdl-list__item-text-body">
                                           Liked your post : "African Print Office Wear".
                                          </span>
                                          <span>2 minutes ago</span>
                                      </span>
                                  </a>
                                </li>
                              </ul>
                              {{-- Break the menu --}}
                          </li>
                          <li class="mt-dropmenu__footer">
                            <a href="#">View All</a>
                          </li>
                        </ul>
                    </li>
                    <!-- Avatar Dropdown -->
                   <li>
                      <a href="/{{$user->username}}" class="dropdown-toggle mt-top-avatar" id="avatar">
                        <img alt="" class="img-circle" src="{{$user->profile->avatar}}" width="40px" height="40px">
                      </a>
                          {{-- avatar menu --}}
                          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="avatar">
                          <li class="mdl-menu__item"><a href="/jobizzness">Profile</a></li>
                          <li class="mdl-menu__item"><a href="/">Collections</a></li>
                          <li class="mdl-menu__item"><a href="/">Saves</a></li>
                          <li class="mdl-menu__item"><a href="/">Settings</a></li>
                          <li class="mdl-menu__item"><a href="/">Logout</a></li>
                        </ul>
                    </li>
                  </ul>
                </div>