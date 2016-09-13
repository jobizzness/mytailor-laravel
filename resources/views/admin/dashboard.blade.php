@extends('layouts.template.admin.page-with-aside')

@section('pagetitle', 'Dashboard')

@section('controller', 'ng-controller="DashboardController"')
@section('bg', 'grey60')
@section('sidebar_title', 'Analytics')
@section('icon', 'mdi-chart-areaspline')

@section('page_styles')

  <link href="/themes/default/assets/vendor/c3-angular/c3.min.css" rel="stylesheet" type="text/css"/>

@section('main')

<section>
                @include('partials.breadcrump')
                <!-- here is where our view starts -->
                <div class="call-admin-head clearfix">
                  <div class="performance-title-wrapper">
                     <i class="mdi mdi-chart-line"></i>
                    <h4 class="mt-md-title">Daily Performance</h4>
                  </div>

                  <div class="mt-right-icons">
                      <ul class="admin-call-icons">
                          <li><a href="{{route('admin.shots.index')}}" class="btn icon-round" title="Shots media">
                              <i class="mdi mdi-image"></i>
                            </a></li>
                           <li><a href="#" class="btn" title="check messages">
                              <i class="mdi mdi-email"></i>
                            </a></li>
                            <li><a href="#" class="btn" title="add a new tailor">
                              <i class="mdi mdi-account-plus"></i>
                            </a></li>

                      </ul>

                  </div>
                </div>
                <!-- Cards and other stuffs in one bag -->
                <div class="row mdl-grid">

                    <div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--2dp">
                      <section class="blue mdl-card__supporting-text purple mt-chart-card">
                          <div>
                              <h2 class="chart-title">Today's Sales</h2>
                              <h3 class="chart-number">0</h3>
                          </div>
                      </section>
                      <section class="mdl-card__actions mdl-card--border chart-info">
                          <div class="clear-fix">
                              <ul class="row chart-text-addups clearfix">
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span>+$0.00</span>
                                    Total revenue
                                  </div>
                                </li>
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span>$0.00</span>
                                    Today's sales
                                  </div>
                                </li>
                              </ul>
                          </div>
                      </section>
                    </div>

                    <div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--2dp">
                         <section class="bluegreen mdl-card__supporting-text purple mt-chart-card">
                            <div class="p-10">
                              <h2 class="chart-title">Today's Customers</h2>
                              <h3 class="chart-number">0</h3>
                          </div>
                      </section>
                      <section class="mdl-card__actions mdl-card--border chart-info">
                        <div class="clear-fix">
                              <ul class="row chart-text-addups clearfix">
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span>0</span>
                                    Monthly total
                                  </div>
                                </li>
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span>0</span>
                                    Today's total
                                  </div>
                                </li>
                              </ul>
                          </div>
                      </section>
                    </div>

                    <div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--2dp">
                       <section class="redish mdl-card__supporting-text purple mt-chart-card">
                            <div class="p-10">
                              <h2 class="chart-title">New Users</h2>
                              <h3 class="chart-number" ng-bind="ma.new_users.totalsForAllResults['ga:newUsers']"></h3>
                          </div>
                      </section>
                      <section class="mdl-card__actions mdl-card--border chart-info">
                        <div class="clear-fix">
                              <ul class="row chart-text-addups clearfix">
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span ng-bind="ma.monthly_users.totalsForAllResults['ga:users']"></span>
                                    Monthly total
                                  </div>
                                </li>
                                <li class="mdl-cell mdl-cell--6-col">
                                  <div>
                                    <span ng-bind="ma.todays_users.totalsForAllResults['ga:users']"></span>
                                    Today's total
                                  </div>
                                </li>
                              </ul>
                          </div>
                      </section>
                    </div>
                    <!-- More Cards -->
                    <div class="feeds-card mdl-card mdl-cell mdl-cell--8-col mdl-shadow--2dp" style="height: 400px;">
                    <header class="admin-feeds-header">
                      <div class="caption link-text">
                        <i class="mdi mdi-share-variant" style="font-size: 1.5em;"></i>
                        <span>Recent Activities</span>
                      </div>
                    </header>
                      <section class="feeds-wrapper --scroll">


                      </section>
                    </div>
                    <div class="mdl-card panel-basic mdl-cell mdl-cell--4-col mdl-shadow--2dp" style="height: 300px;">
                        <div class="mt-panel-heading">
                            <div class="">
                              <button class="btn mdl-button icon-round" id="dropdown">
                                  <i class="icon-center mdi mdi-dots-vertical" data-type="hidden" style="color:#F23054"></i>
                              </button>
                            </div>

                            <h2 class="grey-text">Server load</h2>
                            <h1 class="server-value">68%</h1>
                        </div>
                        <div class="mt-panel-chart">

                        </div>
                    </div>
                      <!-- Todos Card -->
                    <div class="todos-card mdl-card mdl-cell mdl-cell--6-col mdl-shadow--2dp" style="min-height:240px;">
                        <header class="todos-header">
                          <div>Todo's List</div>

                          <div class="action pull-right">
                              <button type="button" class="btn mdl-button">
                                <i class="mdi mdi-check"></i>
                              </button>
                            </div>
                        </header>
                    </div>

                    <div class="feeds-card mdl-card mdl-cell mdl-cell--3-col mdl-shadow--2dp bg-facebook white-color" style="min-height:280px;">
                    Facebook Feed
                    </div>

                    <div class="feeds-card mdl-card mdl-cell mdl-cell--3-col mdl-shadow--2dp bg-twitter  white-color" style="min-height:280px;">
                    Twitter Feed
                    </div>
                    <div class="feeds-card mdl-card mdl-cell mdl-cell--4-col mdl-shadow--2dp" style="min-height:260px;" id="pie1">
{{--                         <c3chart bindto-id="pie-plot1-chart" sort-data="desc">
                          <chart-column column-id="Returning"
                                        column-values="48.5"
                                        column-type="pie"
                                        column-color="#259b24"/>
                          <chart-column column-id="New"
                                        column-values="51.5"
                                        column-type="pie"
                                        column-color="#03a9f4"/>
                          <chart-pie expand="true" show-label="true" threshold-label="0.1"/>
                      </c3chart> --}}
                    </div>

                    <div class="feeds-card mdl-card mdl-cell mdl-cell--8-col mdl-shadow--2dp" style="min-height:240px;">
                    Chats here
                    </div>

                    <div class="feeds-card mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp bg-blue500" style="min-height:240px;" id="chart1"></div>
                </div> <!-- First row ends -->

                <div class="row">

                </div>
         @endsection

                @section('aside')
            <!-- Aside goes here -->
            
                          <div class="pb-5">
                            <h4>Insights</h4>
                          </div>
                          <div class="pb-5 clearfix">
                              <ul class="cl-2-sales">
                                <li>
                                  <div class="cl-2-item">
                                    <span>00</span>
                                      <a href="#" class="link-text">New Sales</a>
                                  </div>
                                </li>
                                  <li>
                                  <div class="cl-2-item">
                                    <span>$0.00</span>
                                      <a href="#" class="link-text">Weekly Profit</a>
                                  </div>
                                </li>
                              </ul>
                          </div>

                          <div class="pb-5 clearfix side-bar-analy__item">
                            <h3>Monthly Visits</h3>
                            <span ng-bind="ma.mon_visits.totalsForAllResults['ga:sessions']"></span>
                          </div>
                          <div class="pb-5 clearfix side-bar-analy__item">
                            <h3>Monthly Profit</h3>
                            <span>$0.00</span>
                          </div>
                          <div class="pb-5 clearfix side-bar-analy__item">
                            <h3>Monthly Customers</h3>
                            <span>00%</span>
                          </div>

                    <div class="p-20">



                    </div>


</section>

@endsection

@section('page_scripts')

  <script src="/themes/default/assets/vendor/c3-angular/d3.min.js" charset="utf-8"></script>
  <script src="/themes/default/assets/vendor/c3-angular/c3.min.js"></script>

  @endsection