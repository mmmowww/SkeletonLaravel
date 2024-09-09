<?php

namespace App\Domain\Users;

use App\Models\User;
use App\Domain\Users\Tools\JwtService;
use App\Domain\Users\Tools\UsersService;

class UsersManager
{
    public function __construct(
        private JwtService $jwtService,
        private UsersService $usersService,

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
     * @return \stdClass
     */
    public function decodeJWT(string $token): \stdClass
    {
        return $this->jwtService->decode($token);
    }

    /**
     * @param string $token
     * @return User
     */
    public function logIn(string $token): User
    {
        $decode = $this->decodeJWT($token);
        return $this->usersService->login($decode);
    }

    /**
     * @return void
     */
    public function logOut(): void
    {
        $this->usersService->logout();
    }

    /**
     * @return User
     */
    public function profile(): User
    {
        return $this->usersService->profile();
    }
}
