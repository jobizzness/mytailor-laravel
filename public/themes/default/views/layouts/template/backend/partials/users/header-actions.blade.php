 {{-- Notification area and avatar --}}
                <div class="mt-top-menu">
                  <ul class="user-actions flex-center">
                  <!-- Notification Icon and Dropdown -->
                    <li>
                      <a href="#" id="notifications">
                        <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="5"><i class="mdi mdi-bell"></i></div>
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
                  <!-- Mail Icon and Dropdown -->
                    <li>
                      <a href="#" class="dropdown-toggle hover-initialized" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="messages">
                        <div class="material-icons mdl-badge mdl-badge--overlap" data-badge=""><i class="mdi mdi-email"></i></div>
                      </a>
                        {{-- Followers dropdown --}}
                        <ul class="mdl-menu mt-drop__menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="messages">
                          <li class="mt-dropmenu__header">MESSAGES</li>
                        </ul>
                    </li>
                    <!-- Hmm Icon and Dropdown -->
                    <li>
                      <a href="#" class="dropdown-toggle hover-initialized" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="new-followers">
                        <div class="material-icons mdl-badge mdl-badge--overlap" data-badge=""><i class="mdi mdi-account-multiple"></i></div>
                      </a>
                          {{-- Followers dropdown --}}
                          <ul class="mdl-menu mt-drop__menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="new-followers">
                          <li class="mt-dropmenu__header">FOLLOWERS</li>
                        </ul>
                    </li>
                    <!-- Avatar Dropdown -->
                   <li>
                      <a href="#" class="dropdown-toggle mt-top-avatar" id="avatar">
                        <img alt="" class="img-circle" src="{{'/uploads/profiles/'.$user->profile->avatar}}" width="40px" height="40px">
                      </a>
                          {{-- avatar menu --}}
                          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="avatar">
                          <li class="mdl-menu__item">Some Action</li>
                          <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">Another Action</li>
                          <li disabled class="mdl-menu__item">Disabled Action</li>
                          <li class="mdl-menu__item">Yet Another Action</li>
                        </ul>
                    </li>
                  </ul>
                </div>