            @include('layouts.template.admin.partials.head')
                    @include('layouts.template.admin.partials.header')
            @include('layouts.template.admin.partials.sidebar_nav')
            <div class="mt-page-wrapper" ng-controller="shotsController">

                <div class="mt-layout-content">
                
                    <div class="mt-row--fullwidth mdl-grid">
                      <main class="admin-main-wrapper mdl-cell mdl-cell--8-col">

                      @yield('main')
                      </main>

                      <aside class="action-feed mdl-cell mdl-cell--4-col" style="background: #eee; color:#888;">

                      @include('layouts.template.admin.partials.right-aside')
                      </aside>
                    </div>
                </div>
            @include('layouts.template.admin.partials.foot')