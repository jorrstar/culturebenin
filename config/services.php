<?php
return [

    // ...
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'), // ex: https://your-app.test/auth/callback/google
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT'), // ex: https://your-app.test/auth/callback/facebook
    ],
    'fedapay' => [
        'api_key' => env('FEDAPAY_API_KEY'),
        'environment' => env('FEDAPAY_ENVIRONMENT', 'sandbox'),
    ],

];
