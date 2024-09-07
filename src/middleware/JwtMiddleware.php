<?php

namespace Sadek\JwtAuth\middleware;

use Illuminate\Http\Request;
use Sadek\JwtAuth\JwtAuth;

class JwtMiddleware
{
    private JwtAuth $jwtAuth;

    public function __construct(JwtAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function handle(Request  $request, \Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token || !$this->jwtAuth->validateToken($token)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}