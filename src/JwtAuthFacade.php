<?php

namespace Sadek\JwtAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sadek\JwtAuth\Skeleton\SkeletonClass
 */
class JwtAuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jwt-auth';
    }
}
