@section('bg', 'grey60')
@section('sub_header')

    <nav class="mdl-navigation mt-nav-has-border">
        <a class="mdl-navigation__link" href="">Latest</a>
        <a class="mdl-navigation__link" href="">Most viewed</a>
        <a class="mdl-navigation__link red __active" href="">Favorites</a>
        <a class="mdl-navigation__link" href="">Showcase</a>
        <a class="mdl-navigation__link" href="">Local</a>
    </nav>

{{--     <button id="demo-menu-lower-right"
        class="icon-round mdl-button mdl-js-button mdl-button--icon">
            <i class="icon-center mdi mdi-dots-vertical"></i>
    </button> --}}

@endsection

@forelse($designers as $designer)

  <section class="mt-ptop mdl-grid designer-item" id="{{$designer->user['id']}}">
      <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp pad-1 mdl-grid">
        <hr style="width: 100%;">
        <div class="mdl-cell mdl-cell--3-col pad-1">
            <a href="#" class="mt-avatar__link"><h3>{{$designer->profile['username']}}<p>Sarasota, FL</p></h3></a>
            <a href="" class="mt-avatar-circle">
               <img height="175" width="175" src="/uploads/profiles/{{$designer->profile['avatar']}}" alt="{{$designer->profile['username']}}">
            </a>
            <h3 class="mt-title__text">About Me</h3>
            <p class="mt_support__text">{{$designer->profile['bio']}}</p>
        </div>
       {{--  @foreach($designer->shots as $shot) --}}
            <div class="card mdl-cell mdl-cell--3-col mdl-shadow--2dp mdl-cell--4-col-phone" style="background:;">
                  <div class="mt__media-card">
                    <a ng-click="open(&quot;mt_91213cab481d8eeed9b5b8f1db76abe8.jpg&quot;)">
                      <img src="/uploads/mt_91213cab481d8eeed9b5b8f1db76abe8.jpg">
                    </a>
                  </div>
                   <div class="mdl-card__actions mdl-card--border" style="position: relative;">

                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect icon-round" style="float: none;" data-upgraded=",MaterialButton,MaterialRipple">
                            <i class="mdi mdi-heart-outline icon-center" style="font-size: 1.2em;color: #F23054;"></i>
                            <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                        <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                         <span style="font-size: 13px;"></span>

                        <span class="designer_card__views">
                            <i class="mdi mdi-eye"></i>
                            <span style="font-size: 12px;">129 views</span>
                        </span>
                        <button id="card-right-button" class="mdl-button mdl-js-button mdl-button--icon" data-upgraded=",MaterialButton">
                <i class="icon-center mdi mdi-dots-vertical"></i>
               </button>
                    </div>
                </div>
        {{-- @endforeach --}}
        <hr style="width: 100%;">
      </div>
    
  </section>

@empty

    <div class="mt-noresult"><h4>ohh no ! sorry we didnt find anything.</h4></div>


@endforelse