<?php

namespace App\Domain\Users;

use App\Domain\JWT\Tools\JwtService;
use App\Domain\Users\DTO\UserDTO;
use App\Domain\Users\Tools\UsersService;
use App\Models\User;

class UsersManager
{
    public function __construct(
        private JwtService $jwtService,
        private UsersService $usersService,

    ) {
    }

    /**
     * @param string $token
     * @return User
     */
    public function logIn(string $token): User
    {
        $decode = $this->jwtService->decode($token);
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

    /**
     * @param UserDTO $user
     * @return User
     */
    public function create(UserDTO $user): User
    {
        return $this->usersService->create($user);
    }
}
