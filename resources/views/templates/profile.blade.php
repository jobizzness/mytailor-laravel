@section('bg', 'grey60')
@section('header_type', 'just-main')

<section class="mt-layout__90">
    <header class="mt-profile-cover mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
    {{-- Info Side --}}
      <div class="mdl-cell mdl-cell--3-col" style="background: #48484c;">
        <div class="mt-profile__info-box">
            <a href="/@{{shot.owner.username}}" class="mt-avatar-circle">
               <img height="130" width="130" src="/uploads/profiles/11698517_10205466839968531_5750592294516276713_n.jpg" alt="Braden Hamm">
               <i class="mdi mdi-pencil" id="avatar-edit__icon"></i>
            </a>
            <div class="mt-profile__info">
                <a href="#" class="profile__title"><span>Afrodapp</span></a>
                <span class="location__text" style="margin: 8px;"><i class="mdi mdi-map-marker"></i>Sarasota, FL</span>
            </div>
        </div>
        <div class="profile__info-actions">
           <ul>
               <li class="mdl-button mdl-js-button mdl-js-ripple-effect">
                  <a href="#"><i class="mdi mdi-account"></i>90k</a></li>
               <li class="mdl-button mdl-js-button mdl-js-ripple-effect">
                  <a href="#" class="__active"><i class="mdi mdi-heart"></i>100k</a></li>
           </ul>
        </div>
      </div>
      {{-- Wall side --}}
      <div class="mdl-cell mdl-cell--9-col">
        <a href="" class="mt-profile-cover__link mt-profile__wall mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
          <img src="{{'/uploads/covers/photography3.jpg'}}" class="mt-profile-cover__image">
        </a>
      </div>
    </header>

    {{-- Body --}}
      <section class="mdl-grid profile--wrapper mdl-grid--no-spacing">
        <div class="mdl-cell mdl-cell--3-col">
          @include('layouts.template.frontend.partials.users.left__aside')
        </div>
        <div class="mdl-cell mdl-cell--6-col">
          @include('layouts.template.frontend.partials.users.profile-feed')
        </div>
        <div class="mdl-cell mdl-cell--3-col">
          @include('layouts.template.frontend.partials.users.right__aside')
        </div>
      </section>

</section>