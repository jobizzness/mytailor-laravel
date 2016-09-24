
{{--Main Layout for home xiew--}}
@extends('layouts.template.frontend.default')
@section('controller', $page->controller ? "ng-controller='$page->controller'": '')

{{--Content Area for our view--}}

@section('main')
    @if($page->view)

        {!! $page->view->render() !!}

    @else

        {!! $page->content !!}

    @endif
@endsection