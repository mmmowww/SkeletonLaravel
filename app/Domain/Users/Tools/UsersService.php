<?php

namespace App\Domain\Users\Tools;

use App\Domain\Users\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

    public function create(UserDTO $user): User
    {
        $userCreate = new User();
        $userCreate->email = $user->email;
        $userCreate->name = $user->firstName;
        $userCreate->last_name = $user->lastName;
        $password = $password ?? Str::random(40);
        $userCreate->password = Hash::make($password);
        $userCreate->save();
        return $userCreate;
    }
}
