
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('controller', $page->controller ? "ng-controller='$page->controller'": '')

{{--Content Area for our view--}}

@section('main')
    @if($page->view)

    	{{-- Main Fab Action Button --}}
    	@if($user)
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored float" 
                type="file" 
                ngf-select="uploadShot($file, $invalidFiles)"
                accept="image/*" 
                ngf-max-height="1000" 
                ngf-max-size="5MB" 
                id="main-caller_fab">

                <i class="mdi mdi-camera"></i>
            </button>
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