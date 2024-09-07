<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'secret' => env('JWT_SECRET', 'your-secret-key'),
    'ttl' => env('JWT_TTL', 60 * 60),
    'algorithm' => env('JWT_ALGO', 'HS256')
];