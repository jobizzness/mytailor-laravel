
@section('bg', 'grey60')
@section('sub_header')

    <div class="mdl-layout-spacer"></div>
    <nav class="mdl-navigation mt-nav-has-border">
      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/latest')}}" href="{{URL::to('shots/latest')}}">Latest</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/trending')}}" href="{{URL::to('shots/trending')}}">Trending</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/featured')}}" href="{{URL::to('shots/featured')}}">Featured</a>
    </nav>

    <div class="mdl-layout-spacer"></div>

    <!-- Secondary Navigation -->
    @include('layouts.template.frontend.partials.secondary_header')

@endsection


  {{-- Shots --}}
  @include('layouts.template.frontend.partials.pages.shots-feed')