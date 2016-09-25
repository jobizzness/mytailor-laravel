            <header class="mt-layout-header mt-header--fixed" itemscope itemtype='https://schema.org/WPHeader'>
                <div class="mt-global-header flex-center">
                  <div ng-click="toggleSidebar()" class="mdl-layout__drawer-button pull-left"><i class="mdi mdi-menu"></i></div>

                  {{-- Logo --}}
                    <div>
                      <h1>
                        <a href="http://www.mytailorafrica.com/"><span class="mt-logo__icon">MyTailorAfrica</span></a></h1>
                    </div>

                  {{-- Search bar starts here --}}
                    <div class="mt-search-wrapper expandable--search hide-on-phone">
                      <span class="icon-search"><i class="mdi mdi-magnify" style="font-size: 22px;"></i></span>
                      <form method="Get" action="#" id="search-box">
                      </form>
                  </div>
                  <button class="icon-round mdl-button mt-toggle-search" style="visibility:hidden;">
                      <i class="mdi mdi-magnify icon-center" data-type="search"></i>
                  </button>

                {{-- Non-Login user Actions --}}
                  @if( $user)

                    @include('layouts.template.frontend.partials.users.header-actions') 

                  @endif
                </div><!-- global header ends--> 
            </header>
            {{-- CSRF Token --}}
            <input type="hidden" class="hidden" name="_token" value="{{csrf_token()}}" id="csrf">