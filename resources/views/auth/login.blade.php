
@extends('layouts.auth')
@section('pagetitle', 'Login')
@section('heading', 'Welcome, please login.')

@section('main')
    <style type="text/css">

        .flex-center{
            display: flex;
            justify-content: center;
            height: 100%;
            align-items: center;
        }

        .mdl-textfield__input{
            padding: 1em 0;
            font-size: small;
        }

        .mdl-textfield__input:focus{
            background-color: inherit;
        }
        .btn-lg{
            min-width: 100%;
            height: 50px;
            margin-bottom: 20px;
        }
                /* Change the white to any color ;) */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #eee inset;
        }


    .mdl-textfield__label:after {
        background-color: rgb(255, 64, 129);
    }

    .mdl-textfield--floating-label.is-focused .mdl-textfield__label, .mdl-textfield--floating-label.is-dirty .mdl-textfield__label, .mdl-textfield--floating-label.has-placeholder .mdl-textfield__label{
        color: rgb(255, 64, 129);
    }

    </style>
    
    <section class="flex flex-center">
    <div class="mdl-card mdl-shadow--6dp" 
            style="display: inline-block;width: 370px; padding: 32px 48px 0px 48px;background: #EEE;">

        <div class="mdl-card__supporting-text">
            <form method="post">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="email" type="text" id="username" />
                    <label class="mdl-textfield__label" for="username">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="password" type="password" id="userpass" />
                    <label class="mdl-textfield__label" for="userpass">Password</label>
                </div>
                <div class="mdl-card__actions">
                    <center>
                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn-lg">
                          Login
                        </button>
                        <input type="hidden" class="hidden" name="_token" value="{{ csrf_token() }}">
                    </center>
            </div>
            </form>
        </div>
    </div>
    </section>




@endsection