
@extends('layouts.auth')
@section('pagetitle', 'Sign Up')

@section('main')

<section class="main_layout">
    
    <div class="mdl-grid mdl-grid--no-spacing mdl-shadow--2dp auth-card">
        <div class="mdl-cell mdl-cell--6-col">
                <div class="heading" style="padding-top: 35px">
                    <p>Welcome Back, Please Log In</p>
                </div>
                <form class="mdl-grid" method="POST" style="width: 500px;" novalidate="">

                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="email" name="email">
                        <label class="mdl-textfield__label" for="email">Mobile number or Email</label>
                    </div>
                    <input type="hidden" name="_token"value="{{csrf_token()}}"></input>
                    <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="password" id="pass" name="password">
                        <label class="mdl-textfield__label" for="pass">Password</label>
                    </div>

                    <div class="login_button mdl-cell mdl-cell--12-col">
                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                          Log In
                        </button>
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