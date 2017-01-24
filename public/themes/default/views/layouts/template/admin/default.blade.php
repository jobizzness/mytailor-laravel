@include('layouts.template.admin.partials.head')
@include('layouts.template.admin.partials.header')
@include('layouts.template.admin.partials.sidebar_nav')

            <div class="mt-page-wrapper" ng-controller="@yield('controller')">

                <div class="mt-layout-content">
                    <div class="mt-row--fullwidth mdl-grid">
                        <main class="admin-full-wrapper mdl-cell mdl-cell--12-col" style="margin: auto;">
                              @yield('main')
                        </main>
                    </div>
                </div>

                {{-- SnackBar --}}
                <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
                  <div class="mdl-snackbar__text"></div>
                  <button class="mdl-snackbar__action" type="button"></button>
                </div>

                <!-- Black Screen -->
                <div class="mt-obfuscator" ng-class="{'show': toggle}" ng-click="toggleSidebar()"></div>
                {{-- Upload Shot Call --}}
            @include('layouts.template.admin.partials.foot')