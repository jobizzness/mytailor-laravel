
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('controller', $page->controller ? "ng-controller='$page->controller'": '')

{{--Content Area for our view--}}

@section('main')
    @if($page->view)

    	<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-button--mini-fab mdl-button--colored float" id="main-caller_fab"><i class="mdi mdi-camera"></i></a>

        {!! $page->view->render() !!}

    @else

        {!! $page->content !!}

    @endif

@endsection