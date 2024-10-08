<?php

namespace Sadek\JwtAuth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth
{
    private $secret;
    private $algorithm;
    private $ttl;

    public function __construct()
    {
        $this->secret = config('jwt-auth.secret');
        $this->algorithm = config('jwt-auth.algorithm');
        $this->ttl = config('jwt-auth.ttl');
    }

    public function generateToken($user)
    {
        $payload = [
            'iss' => url('/'),
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + $this->ttl,
        ];

        return JWT::encode($payload, $this->secret, $this->algorithm);
    }

    public function validateToken($token)
    {
        try {
            $decodedToken = JWT::decode($token, new Key($this->secret, $this->algorithm));
            return (array)$decodedToken;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
