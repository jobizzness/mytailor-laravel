@extends('layouts.template.admin.page-with-aside')

@section('pagetitle', 'Shots')
@section('controller', "ng-controller='shotsController'")

    @section('page_styles')
        <link rel="stylesheet" type="text/css" href="{{ theme('css/vendor/ng-img-crop/ng-img-crop.css')}}">
        <link rel="stylesheet" href="{{ theme('css/vendor/ng-dialog/ngDialog.min.css') }}">
        <link rel="stylesheet" href="{{ theme('css/vendor/select2/select2.min.css') }}">
    @endsection

@section('sidebar_title', 'Edit Shot')
@section('icon', 'mdi-pencil-box')
@section('bg', 'grey60')

@section('main')

          @include('partials.breadcrump')
           <div class="row m-0">
           		<header class="admin-shots-head">
                <div style="height: 60px;">
                  <button class="btn mdl-button icon-round">
                    <a href="{{route('shots.upload')}}"><i class="mdi mdi-cloud-upload icon-center red"></i></a>
                  </button>

                </div>
                <!-- ToolBar starts here -->
           			<div class="mt-tool-bar">
                {{-- Search Box --}}
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                      <i class="mdi mdi-magnify"></i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                    <form method="Get" action="">
                      <input class="mdl-textfield__input" type="search" name="q" id="fixed-header-drawer-exp">
                      </form>
                    </div>
                  </div>
           			</div>
           		</header>
           		<section class="mdl-grid admin-shots-wrapper">

                   @foreach($shots as $shot)
                      <div class="shot-item mdl-cell mdl-cell--4-col">
                         <a ng-click="show({{$shot->id}})">
                          <figure class="">
                             <img src="{{$shot->image->original}}">
                          </figure>
                         </a>ss
                      </div>
                  @endforeach

           		</section>
                {!! $shots->render() !!}
@endsection

@section('aside')

			<!-- Aside goes here -->
                
          <div class="mt-header-shotEdit mdl-card__actions animated fadeIn">
                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1" style="
    margin-top: 10px;" ng-class="{'is-checked':shot.published}">
                  <input type="checkbox" id="switch-1" class="mdl-switch__input" ng-model="shot.published">
                  <span class="mdl-switch__label">Publish</span>
                </label>
                <!-- Right aligned menu below button -->
                <button id="form-actions"
                        class="mdl-button btn float action_butt">
                        ACTIONS
                <i class="mdi mdi-menu-down"></i>
                </button>

                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                    for="form-actions">
                  <li class="mdl-menu__item" ng-click="clickToOpen()">Set Featured</li>
                  <li class="mdl-menu__item">Edit</li>
                  <li class="mdl-menu__item" ng-click="destroy()">Delete</li>
                </ul>
          </div>

          <section class="pad-1">
          	<form type="post" ng-submit="updateShot()">
          		<div class="form-body">
					<div class="mt-form-group">
                      <input type="text" class="" readonly="" disabled="" ng-model="shot.url">
                      <label class="top-label">URL</label>
                  </div>
                  <div class="mt-form-group">
                      <input type="text" class="" ng-model="shot.views">
                      <label class="top-label">Title</label>
                  </div>
                  <div class="mt-form-group">
                      <input type="text" class="" ng-model="shot.source_url">
                      <label class="top-label">Source URL</label>
                  </div>
                  <div class="mt-form-group">
                      <select ng-model="shot.category">
                          <option value="men">Men</option>
                          <option value="women">Women</option>
                          <option value="kids">Kids</option>
                          <option value="couples">Couples</option>
                          <option value="accessories">Accessories</option>
                      </select>
                      <label class="top-label">Category</label>
                  </div>
                  <div class="mt-form-group">
                      <ui-select multiple tagging="tagTransform" ng-model="shot.tags" theme="bootstrap" sortable="true" ng-disabled="ctrl.disabled">
                          <ui-select-match>
                              <span>@{{$item.tag_name}}</span>
                          </ui-select-match>
                          <ui-select-choices repeat="tag in tagsList | filter: {tag_name: $select.search}">
                              <option value="@{{tag.id}}">@{{tag.tag_name}}</option>
                          </ui-select-choices>
                      </ui-select>
                      <label class="top-label">Tags</label>
                  </div>
                  <div class="mdl-checkbox mb-30">
                      <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1" ng-class="{'is-checked':shot.featured}">
                      <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" ng-model="shot.featured">
                      <span class="mdl-checkbox__label">Feature</span>
                    </label>
                 </div>
                  <div class="mt-form-group">
                      <textarea class="" rows="7" ng-model="shot.description"></textarea>
                      <label class="top-label">Description</label>
                  </div>

              </div>

              <div class="center form-buts-wrap">
                  <button type="submit" class="btn float mdl-button btn-blue">Submit</button>
                  <button ng-click="reset()" class="btn float mdl-button">Cancel</button>
              </div>
          	</form>
          </section>


    <div class="p-20">



    </div>


@endsection
