    <ul class="mt-secondary__navigation" ng-cloak>
        <li class="mt-menu__item drop" ng-repeat="link in links">
          <a href="#">@{{link.name}} <i class="mdi mdi-chevron-down"></i></a>
{{--             <div class="mt-drop-items">
              <ul>
                <li ng-repeat="item in link.dropElements">
                  <a href="@{{item.link}}">
                    <strong>@{{item.text}}</strong>
                  </a>
                </li>
              </ul>
            </div> --}}
        </li>
    </ul>