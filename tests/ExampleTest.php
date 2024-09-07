<?php

test('test_generateToken', function () {
    config(['jwt-auth.secret' => 'hy5dPorIM2Holq1RXvBOYkEWGJpLZICe', 'jwt-auth.ttl' => 60, 'jwt-auth.algorithm' => 'HS256']);

    // Mock the TTL (Time to Live) for the token
    $user = new class {
        public $id = 2;
        public $name = 'Sadek';
    };
    $auth = new \Sadek\JwtAuth\JwtAuth();
    $token = $auth->generateToken( (object)$user);

    file_put_contents("token_log.txt", "Generated Token: " . $token . PHP_EOL);
    expect($token)->not->toBeNull();

    $decoded = $auth->validateToken($token);

    expect($decoded->sub)->toBe($user->id);
});
