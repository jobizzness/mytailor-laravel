@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="mt-layout__90" ng-cloak>
    <header class="mt-profile-cover mdl-grid mdl-grid--no-spacing">
    {{-- Info Side --}}
      <div class="mdl-cell mdl-cell--12-col">
        <div class="mt-profile__info-box">
            <a href="/{{$profile->username.'/'.avatarRoute($profile, $user)}}" class="mt-avatar-circle">
               <img height="130" width="130" src="{{$profile->avatar}}" alt="{{$profile->username}}">
               @if(profileCheck($profile, $user))
                  <i class="mdi mdi-pencil" id="avatar-edit__icon"></i>
                @else
                  <span><i class="mdi mdi-phone" id="avatar-call__icon"></i></span>
                @endif
            </a>
            <div class="mt-profile__info">
                <a href="#" class="profile__title"><span>{{$profile->display_name}}</span></a>
                <span class="location__text" style="margin: 8px;"><i class="mdi mdi-map-marker"></i>Sarasota, FL</span>
                <p class="profile-bio__text" ng-bind-html="'{{$profile->bio}}' | linkfy:'_blank'"></p>
            </div>
            <div class="profile__info-actions">
             <ul>
                 <li class="">
                    <a href="#"><span>50</span> Shots</a></li>
                    <li class="">
                    <a href="#"><span>50</span> Collections</a></li>
                    <li class="">
                    <a href="#"><span>30</span> Followers</a></li>
                 <li class="">
                    <a href="#"><span>10</span> Following</a></li>
             </ul>
          </div>

        </div>
      </div>
    </header>

    {{-- Body --}}
      <section class="mdl-grid profile--wrapper mdl-grid--no-spacing">
        <div class="mdl-cell mdl-cell--12-col">
          @include('layouts.template.frontend.partials.users.profile-feed')
        </div>
      </section>

</section>