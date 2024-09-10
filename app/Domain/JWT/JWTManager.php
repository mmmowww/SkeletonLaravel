<?php

namespace App\Domain\JWT;

use App\Domain\JWT\Tools\JwtService;
use stdClass;

class JWTManager
{
    public function __construct(
        private JwtService $jwtService,
    ) {
    }

    /**
     * @param array $user
     * @return string
     */
    public function codeJWT($user): string
    {
        return $this->jwtService->create($user);
    }

    /**
     * @param string $token
     * @return stdClass
     */
    public function decodeJWT(string $token): stdClass
    {
        return $this->jwtService->decode($token);
    }
}
