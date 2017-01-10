
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('controller', $page->controller ? "ng-controller='$page->controller'": '')

{{--Content Area for our view--}}

@section('main')
    @if($page->view)

    	{{-- Main Fab Action Button --}}
    	@if($user)
            <a ng-click="showShotPoster()" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored float" id="main-caller_fab"><i class="mdi mdi-camera"></i></a>
        @endif

        {{-- Main App Loader --}}
        <div class="pulsating" ng-show="loading">
		  <span class="loader__icon">Afrodapp</span>
		  </svg>
		</div>

        {!! $page->view->render() !!}

    @else

        {!! $page->content !!}

    @endif

@endsection