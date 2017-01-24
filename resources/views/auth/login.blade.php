
@extends('layouts.auth')
@section('pagetitle', 'Login')
@section('heading', 'Welcome, please login.')

@section('main')

<section class="main_layout" style="background-color: #ff4081">
    <div class="">
            <div class="logo-wrap">
                    <a href="https://www.afrodapp.com"><span class="mt-logo__icon">Afrodapp</span></a>
                    <h1 class="logo_text">Afrodapp</h1>
            </div>

            <div class="">
                <form action="/login?remember=true" class="login_form" method="POST">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="email" id="email" name="email">
                    <label class="mdl-textfield__label" for="email">Username or Email</label>
                  </div>
                  <input type="hidden" name="_token"value="{{csrf_token()}}"></input>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="pass" name="password">
                    <label class="mdl-textfield__label" for="pass">Password</label>
                  </div>

                  <div class="form_actions">
                    <div style="color: rgba(255, 255, 255, 0.66);"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                      <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
                      <span class="mdl-checkbox__label">Remember</span>
                    </label></div>
                    <a href="/auth/reset" id="forget-pass">Forgot Password?</a>
                  </div>
                  <div class="login_button">
                        <!-- Accent-colored raised button with ripple -->
                      <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab">
                         <i class="material-icons">chevron_right</i>
                      </button>
                  </div>

                </form>     
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