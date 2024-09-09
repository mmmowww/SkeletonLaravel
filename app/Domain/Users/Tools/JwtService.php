<?php

namespace App\Domain\Users\Tools;

use Firebase\JWT\Key;
use stdClass;

class JwtService
{
    private const string JWT_KEY = '8a4bcd96f19752d8d3d8ba7882256c2e7e44065c119d7ee2506d096992ccbb6e';
    private const string JWT_ALGORITHM = 'HS256';

    /**
     * @param array $user
     * @return string
     */
    public static function create(array $user): string
    {
        return \Firebase\JWT\JWT::encode($user, self::JWT_KEY, self::JWT_ALGORITHM);
    }

    /**
     * @param string $jwt
     * @return \stdClass
     */
    public static function decode(string $jwt): stdClass
    {
        return \Firebase\JWT\JWT::decode($jwt, new Key(self::JWT_KEY, self::JWT_ALGORITHM));
    }


}
