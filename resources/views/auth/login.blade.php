
@extends('layouts.auth')

@section('pagetitle', 'Login')

@section('heading', 'Welcome, please login.')

@section('content')

            <form method="post" class="login-form clearfix">
                <div class="row">
                    <div class="mdl-cell mdl-cell--6-col">
                        <input type="text" placeholder="Login" class="mt-forms login-username" id="login-username" name="email"> </div>
                    <div class="mdl-cell mdl-cell--6-col">
                        <input type="password" placeholder="Password" class="mt-forms login-password" id="login-password" name="password"> </div>
                        <input type="hidden" class="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="row">
                    <div class="mdl-cell mdl-cell--4-col">
                        <div class="rem-password">
                            <p>Remember Me
                                <div class="checker"><span class=""><input type="checkbox" class="rem-checkbox"></span></div>
                            </p>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--8-col text-right">

                        <div class="forgot-password">
                            <a href="javascript:;">Forgot Password?</a>
                        </div>
                        <button class="btn mt-ms-button redish" type="submit">LogIn</button>

                        @if($errors->any())
                        <div class="login-error">
                            <span class="danger-text">Opps ! We found weird stuff but try again</span>
                        </div>                            
                        @endif

                    </div>
                </div>
            </form>


@endsection