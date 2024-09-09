<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK_URL'),
    ],

    'click' => [
        'merchant_id' => env('CLICK_MERCHANT_ID'),
        'service_id' => env('CLICK_SERVICE_ID'),
        'secret_key' => env('CLICK_SECRET_KEY'),
        'merchant_user_id' => env('CLICK_MERCHANT_USER_ID'),
        'return_url' => env('CLICK_RETURN_URL'),
        'cancel_url' => env('CLICK_CANCEL_URL'),
    ],

    'payme' => [
        'merchant_id' => env('PAYME_MERCHANT_ID'),
    ],

];
