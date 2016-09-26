@section('bg', 'grey60')

<section class="mt-layout__90">

  <section class="mt-profile__wall">
      <div class="mt-profile-cover">
          <a href="" class="mt-profile-cover__link">
            <img src="{{'/uploads/covers/photography3.jpg'}}" class="mt-profile-cover__image">
          </a>
      </div>
      <div class="mt-profile__info-box">
          <a href="" class="mt-avatar-circle">
             <img height="130" width="130" src="/uploads/profiles/11698517_10205466839968531_5750592294516276713_n.jpg" alt="Braden Hamm">
          </a>
          <div class="mt-profile__info">
                <a href="" class="profile__title">
                  <span>Jobizzness Watumad</span>
                </a>
                 <span class="location__text"><i class="mdi mdi-map-marker"></i>Sarasota, FL</span>

                 <ul class="mt-list-followers">
                   <li class="with--border"><a href="#">90k Following</a></li>
                   <li><a href="#">100k Followers</a></li>
                 </ul>


{{--                 <span class="profile-tag_name">@biness</span> --}}

          </div>
      </div>
      <div class="mt-profile--actions">
          <ul class="mt-profile-action_items">
            <li class="mt-profile-action_item">
              <a href="#">
                <!-- Accent-colored raised button with ripple -->
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mt-button--transparent">
                  <i class="mdi mdi-account-multiple"></i> Follow
                </button>
              </a>
            </li>

            <li class="mt-profile-action_item">
              <a href="#">
                <!-- Accent-colored raised button with ripple -->
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                    <i class="mdi mdi-message"></i> Message
                </button>
              </a>
            </li>
          </ul>

      <div class="mt-profile-action_items --right">
        
      </div>

      </div>

  </section>

  <section class="mdl-grid profile--wrapper">
    <div class="mdl-cell mdl-cell--3-col mdl-shadow--2dp">
      @include('layouts.template.frontend.partials.users.left__aside')
    </div>
    <div class="mdl-cell mdl-cell--6-col">
      @include('layouts.template.frontend.partials.users.profile-feed')
    </div>
    <div class="mdl-cell mdl-cell--3-col mdl-shadow--2dp"></div>
  </section>

</section>