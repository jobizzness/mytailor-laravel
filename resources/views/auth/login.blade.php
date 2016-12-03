
@extends('layouts.auth')
@section('pagetitle', 'Login')
@section('heading', 'Welcome, please login.')

@section('main')

<link rel="stylesheet" type="text/css" href="{{theme('css/register.css')}}">

        <section class="mdl-grid mdl-card mdl-shadow--2dp" style="width: 720px;margin-top: 5em;">
            <div class="mdl-cell mdl-cell--6-col" style="background-image: url('https://s-media-cache-ak0.pinimg.com/564x/b8/76/01/b876015c44544117880fe41f539cf649.jpg');margin: -8px;background-size: cover;">
            </div>
                {{-- Form --}}
            <div class="mdl-cell mdl-cell--6-col" style="margin-left: 30px;">
                <div style="margin:30px auto 0;position:relative;width:55px;">
                    <img src="/images/logo.png" alt="afrodapp-logo" style="width: 100%;">
                </div>
                <div>
                    <p style="text-align: center;color: #000;font-size: 16px;margin-top: 10px;font-weight: 600;">Afrodapp</p>
                </div>
                <form method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name="email" type="text" id="username" />
                        <label class="mdl-textfield__label" for="username">Email</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" name="password" type="password" id="userpass" />
                        <label class="mdl-textfield__label" for="userpass">Password</label>
                    </div>
                    <div class="mdl-card__actions">
                        <center>
                            {{-- Facebook --}}
                            <a href="/login/facebook" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn-lg" style="background-color: #3b5998;height: 50px;margin-bottom: 30px;    line-height: 49px;">
                                <span style="margin-right: 10px;">
                                    <img src="https://www.facebook.com/rsrc.php/v3/yo/r/jVG1f1GslU7.png" alt="" width="31" height="31"></span><span>Login with Facebook</span>
                            </a>

                            <p class="AlternativesSeparator" style="margin-bottom:10px;overflow:hidden;text-align:center;color:#000;font-weight:bold;" data-reactid="33">or</p>

                            <!-- Accent-colored raised button with ripple -->
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn-lg" style="background-color:#FB4164">
                              Continue
                            </button>
                            <input type="hidden" class="hidden" name="_token" value="{{ csrf_token() }}">
                        </center>
                    </div>
                </form> 
            </div>
        </section>

@endsection