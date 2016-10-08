@include('layouts.template.frontend.partials.head')
@include('layouts.template.frontend.partials.header')
@include('layouts.template.frontend.partials.sidebar_nav')

    <div class="mdl-layout__content">
        <div class="mt-content">
            <main class="" style="margin: auto;" @yield('controller')>
                @yield('main')
            </main>
        </div>
        @include('layouts.template.frontend.partials.search')
        @include('partials.flashing')
    </div>
@include('layouts.template.frontend.partials.foot')