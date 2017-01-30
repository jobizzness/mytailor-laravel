
@extends('layouts.auth')
@section('pagetitle', 'Sign Up')

@section('main')

<section class="main_layout">
    
    <div class="mdl-grid mdl-grid--no-spacing mdl-shadow--2dp auth-card">
        <div class="mdl-cell mdl-cell--6-col">
                <div class="heading">
                    <p>Welcome, Get Started Today</p>
                </div>
                <form class="mdl-grid" method="POST" style="width: 500px;" action="{{route('auth.register')}}">
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="text" id="first_name" name="first_name" required="">
                        <label class="mdl-textfield__label" for="first_name">First name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="text" id="last_name" name="last_name" required="">
                        <label class="mdl-textfield__label" for="last_name">Last name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="email" id="email" name="email" required="">
                        <label class="mdl-textfield__label" for="email">Email</label>
                    </div>
                    <input type="hidden" name="_token"value="{{csrf_token()}}"></input>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="password" id="password" name="password">
                        <label class="mdl-textfield__label" for="password">Password</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--6-col">
                        <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation">
                        <label class="mdl-textfield__label" for="password_confirmation">Re-enter Password</label>
                    </div>
                    <div class="login_button mdl-cell mdl-cell--12-col">
                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                          Continue
                        </button>
                        <div style="margin-top:15px;"><span class="" style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-size:11px;font-weight:normal;text-align:center;-webkit-transition:opacity .2s linear;transition:opacity .2s linear;color:#aaa;width:224px;" data-reactid="30"><span data-reactid="31">Creating an account means you’re okay with Afrodapp's <a href="/_/_/about/terms-service/" target="_blank">Terms of Service</a>, <a href="/_/_/about/privacy/plain.html" target="_blank">Privacy Policy</a></span></span></div>
                    </div>
                    <div class="login-options mdl-cell mdl-cell--12-col">
                        <span style="margin-bottom: 3px;overflow: hidden;text-align: center;color: #555;font-weight: bold;">Or</span>
                        <ul class="social-icons">
                            <li>
                                <a class="social-icon-color facebook" href="/login/facebook">
                                    <i class="mdi mdi-facebook-box"></i>
                                </a>
                            </li>
                            <li>
                                <a class="social-icon-color twitter" href="/login/twitter">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="social-icon-color google" href="/login/google">
                                    <i class="mdi mdi-gmail"></i>
                                </a>
                            </li>
                            <li>
                                <a class="social-icon-color linkedin" href="/login/linkedin">
                                    <i class="mdi mdi-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                </div>
                </form>
        </div>
        <div class="mdl-cell mdl-cell--6-col auth-card__image" style="background: url('http://jobizzness.com/wp-content/uploads/2014/03/mock3-3200x2302.png');">
            
        </div>
    </div>
</section>

<div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
</div>

<script>
    (function() {
        'use strict';
        var snackbarContainer = document.querySelector('#demo-snackbar-example');
        console.log(snackbarContainer);
        var data = {
            message: 'Oh No ! Sorry we found errors',
            timeout: 2000,
            actionHandler: function(event) {},
            actionText: 'Undo'
        };

        <?php
         if(count($errors) > 0){
          ?>
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
        <?php } ?>

    }());
</script>
@endsection