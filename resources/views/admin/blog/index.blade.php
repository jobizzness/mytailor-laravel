@extends('layouts.template.admin.default')

@section('controller', 'PostsController')
@section('pagetitle', 'Posts')
@section('main')

    <div class="mt-portlet-wrapper mt-card mdl-cell mdl-cell--12-col-desktop" ng-show="!showForm">
        <div class="mdl-card mt-fullwidth-table">
            <div class="mdl-card__title mt-table-head dark">
                <div class="label">
                    <h2 class="mdl-card__title-text">Posts</h2>
                </div>
                <div class="mdl-layout-spacer"></div>
                <div class="actions">
                    <button class="btn mdl-button icon-round">
                        <a href="#"><i class="mdi mdi-delete icon-center red"></i></a>
                    </button>
                    <button class="btn mdl-button icon-round">
                        <a href="#"><i class="mdi mdi-pencil icon-center red"></i></a>
                    </button>
                    <button class="btn mdl-button icon-round">
                        <a href="#" ng-click="showForm = !showForm"><i class="mdi mdi-account-plus icon-center red"></i></a>
                    </button>
                </div>
            </div>
            <div class="mdl-layout__header-row mt-table-nav">
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation mt-nav-has-border">
                    <a class="mdl-navigation__link" href="">All</a>
                    <a class="mdl-navigation__link __active" href="">Admins</a>
                    <a class="mdl-navigation__link" href="">Users</a>
                    <a class="mdl-navigation__link" href="">Customers</a>
                    <a class="mdl-navigation__link" href="">Team</a>
                    <a class="mdl-navigation__link" href="">Managers</a>
                </nav>
            </div>
            <a ng-click="showpostForm()" class="btn bluegreen">Create</a>
            <table class="mdl-data-table mdl-js-data-table mt-fullwidth-table mdl-data-table--selectable">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Title</th>
                    <th class="mdl-data-table__cell--non-numeric">Slug</th>
                    <th class="mdl-data-table__cell--non-numeric">Author</th>
                    <th class="mdl-data-table__cell--non-numeric">Published</th>
                    <th class="mdl-data-table__cell--non-numeric">Categories</th>
                    <th class="mdl-data-table__cell--non-numeric">Edit</th>
                    <th class="mdl-data-table__cell--non-numeric">Delete</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><a href="#">{{$post->title}}</a></td>
                        <td class="mdl-data-table__cell--non-numeric">{{$post->slug}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$post->publisher->profile->display_name}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$post->present()->publishedDate()}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{-- {{$post->present()->last_seen() or 'Never'}} --}}</td>
                        <td class="mdl-data-table__cell--non-numeric"><a ng-click="editPost({{$post->id}})" id="e{{$post->id}}"><i class="mdi mdi-pencil"></i></a>
                            <div class="mdl-tooltip" for="e{{$post->id}}">Edit</div>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric"><a ng-click="deletePost({{$post->id}})" id="d{{$post->id}}"><i class="mdi mdi-delete"></i></a></td>
                        <div class="mdl-tooltip" for="d{{$post->id}}">Delete</div>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">sorry no data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Form --}}
    <div class="mt-portlet-wrapper mdl-cell mdl-cell--12-col-desktop mdl-grid" ng-show="showForm" ng-cloak> 
        <section class="mdl-grid mdl-cell mdl-cell--8-col-desktop mt-card">

            <form ng-submit="createPost()" novalidate style="width: 100%">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" id="title" ng-model="post.title">
                    <label class="mdl-textfield__label" for="title">Title</label>
                </div>


                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="text" id="slug" ng-model="post.slug">
                    <label class="mdl-textfield__label" for="slug">Slug</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                    <input class="mdl-textfield__input" type="date" id="published_at" ng-model="post.published_at">
                    <label class="mdl-textfield__label" for="published_at">Published At</label>
                </div>
                      
                <textarea class="tinyMCE" ui-tinymce="tinymceOptions" ng-model="post.excerpt" type="text" ></textarea>
                <textarea class="tinyMCE" ui-tinymce="tinymceOptions" type="text" ng-model="post.body"></textarea>
                      

                <div class="login_button mdl-cell mdl-cell--12-col">
                    <!-- Accent-colored raised button with ripple -->
                  <button class="mdl-button mdl-js-button" type="submin">Create New Post</button>
                </div>

                    </form>
        </section>
                <section class="mdl-cell mdl-cell--4-col-desktop mt-card"></section>     
    </div>

@endsection