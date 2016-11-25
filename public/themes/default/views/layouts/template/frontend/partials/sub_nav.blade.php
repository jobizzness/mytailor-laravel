   
    {{-- Mobile --}}
    <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/trending')}}" href="{{URL::to('shots/trending')}}"><svg fill="#202024" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <path d="M0 0h24v24H0V0z" id="a"/>
        </defs>
        <clipPath id="b">
            <use overflow="visible" xlink:href="#a"/>
        </clipPath>
        <path clip-path="url(#b)" d="M23 8c0 1.1-.9 2-2 2-.18 0-.35-.02-.51-.07l-3.56 3.55c.05.16.07.34.07.52 0 1.1-.9 2-2 2s-2-.9-2-2c0-.18.02-.36.07-.52l-2.55-2.55c-.16.05-.34.07-.52.07s-.36-.02-.52-.07l-4.55 4.56c.05.16.07.33.07.51 0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2c.18 0 .35.02.51.07l4.56-4.55C8.02 9.36 8 9.18 8 9c0-1.1.9-2 2-2s2 .9 2 2c0 .18-.02.36-.07.52l2.55 2.55c.16-.05.34-.07.52-.07s.36.02.52.07l3.55-3.56C19.02 8.35 19 8.18 19 8c0-1.1.9-2 2-2s2 .9 2 2z"/>
    </svg></a>

    <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('explore')}}" href="{{URL::to('/explore')}}"><svg fill="#202024" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
  </svg></a>

    <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('notifications')}}" href="{{URL::to('shots/latest')}}"><svg fill="#202024" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
</svg></a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/latest')}}" href="{{URL::to('shots/featured')}}"><svg fill="#202024" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg></a>


{{-- Desktop --}}

{{--       <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('explore')}}" href="{{URL::to('/explore')}}">Trending</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('shots/latest')}}" href="{{URL::to('shots/featured')}}">Explore</a>

      <a class="mdl-navigation__link mdl-js-button mdl-js-ripple-effect {{setActive('notifications')}}" href="{{URL::to('shots/latest')}}">Latest</a> --}}

{{--     <ul class="mt-secondary__navigation" ng-cloak>
        <li class="mt-menu__item drop" ng-repeat="link in links">
          <a href="#">@{{link.name}} <i class="mdi mdi-chevron-down"></i></a>
              <div class="mt-drop-items md-whiteframe-4dp">
                  <ul>
                <li ng-repeat="item in link.dropElements">
                  <a href="@{{item.link}}">
                    <strong>@{{item.text}}</strong>
                  </a>
                </li>
              </ul>
            </div>
        </li>
    </ul>
 --}}
