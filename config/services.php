<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => MyTailor\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect'      => 'https://www.afrodapp.com/login/facebook'
    ],

//    'twitter' => [
//        'client_id' => env('TWITTER_CLIENT_ID'),
//        'client_secret' => env('TWITTER_CLIENT_SECRET'),
//        'redirect' => 'http://dev.mytailor.me/login/twitter',
//    ],
//
//    'pinterest' => [
//        'client_id' => env('PINTEREST_CLIENT_ID'),
//        'client_secret' => env('PIINTEREST_CLIENT_SECRET'),
//        'redirect' => 'http://dev.mytailor.me/login/pinterest'
//    ],

    'pusher' => [
        'app_id' => env('PUSHER_APP_ID'),
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET')
    ]
];
