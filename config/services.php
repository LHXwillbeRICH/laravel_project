<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'weixinweb'=>[
        'client_id'=>env('WEIXINWEB_KEY'),
        'client_secret'=>env('WEIXINWEB_SECRET'),
        'redirect'=>env('WEIXINWEB_REDIRECT_URL'),
        //'auth_base_uri'=>'https://open.weixin.qq.com/connect/qrconnect',
    ],
    'weixin'=>[
        'client_id'=>env('WEIXIN_KEY'),
        'client_secret'=>env('WEIXIN_SECRET'),
        'redirect'=>env('WEIXIN_REDIRECT_URL'),
        //'auth_base_uri'=>'https://open.weixin.qq.com/connect/qrconnect',
    ],
    'WXSHARE'=>[
        'APP_KEY'=>env('WEIXIN_KEY'),
        'APP_SECRET'=>env('WEIXIN_SECRET'),
        'CALLBACK'=>env('WEIXIN_REDIRECT_URL'),
        //'auth_base_uri'=>'https://open.weixin.qq.com/connect/qrconnect',
    ]
];
