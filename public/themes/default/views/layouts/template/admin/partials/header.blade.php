            <header class="mt-layout-header mt-header--fixed" itemscope itemtype='https://schema.org/WPHeader'>
                <div class="mt-global-header flex-center">
                  <div ng-click="toggleSidebar()" class="mdl-layout__drawer-button pull-left"><i class="mdi mdi-menu"></i></div>

                    {{--  --}}
                    @include('layouts.template.backend.partials.users.header-actions') 

                </div><!-- global header ends--> 
            </header>
            {{-- CSRF Token --}}
            <input type="hidden" class="hidden" name="_token" value="{{csrf_token()}}" id="csrf">