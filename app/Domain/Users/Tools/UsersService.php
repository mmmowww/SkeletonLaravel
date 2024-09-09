<?php

namespace App\Domain\Users\Tools;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use stdClass;

class UsersService
{
    public function login(stdClass $user): User
    {
        $user = User::where('first_name', $user->first_name)
            ->where('last_name', $user->last_name)
            ->where('email', $user->email)
            ->firstOrFail();
        Auth::login($user, true);
        return $user;
    }

    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * @return User
     */
    public function profile(): User
    {
        return Auth::user();
    }
}
