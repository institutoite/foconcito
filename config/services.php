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
    |'endpoint' => env('MAILGUN_ENDPOINT', 'smtp.mailgun.org'),
    */

    'mailgun' => [
        'domain' => env('sandbox00e3dd8ef75d4e4692eabe345773f6a4.mailgun.org'),
        'secret' => env('1b6eb03d-3c445376'),
        
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
