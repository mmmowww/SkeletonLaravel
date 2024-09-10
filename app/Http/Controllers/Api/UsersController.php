<?php

namespace App\Http\Controllers\Api;

use App\Domain\Users\DTO\UserDTO;
use App\Domain\Users\UsersManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\JWTRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct(
        private UsersManager $manager
    ) {
    }

    /**
     * @param JWTRequest $request
     * @return string
     *
     * @OA\Post(
     *      path = "/api/login",
     *      summary = "Токен",
     *      description = "Логин по токену",
     *      tags = {"Токен"},
     *
     *      @OA\Parameter(
     *          name = "token",
     *          in = "query",
     *           @OA\Schema(
     *              type = "string",
     *           )
     *       ),
     *      @OA\Response(
     *           response = 200,
     *           description = "Успешно",
     *       ),
     *      @OA\Response(
     *          response = 401,
     *          description = "Пользователь не авторизован"
     *      )
     *  )
     */
    public function logIn(JWTRequest $request)
    {
        return $this->manager->logIn($request->token);
    }

    /**
     * @return User
     *
     * @OA\Get(
     *      path = "/api/profile",
     *      summary = "Токен",
     *      description = "Логин по токену",
     *      tags = {"Токен"},
     *
     *      @OA\Response(
     *           response = 200,
     *           description = "Успешно",
     *       ),
     *      @OA\Response(
     *          response = 401,
     *          description = "Пользователь не авторизован"
     *      )
     *  )
     */
    public function profile()
    {
        return $this->manager->profile();
    }

    /**
     * @return User
     *
     * @OA\Get(
     *      path = "/api/logout",
     *      summary = "Токен",
     *      description = "Логин по токену",
     *      tags = {"Токен"},
     *
     *      @OA\Response(
     *           response = 200,
     *           description = "Успешно",
     *       ),
     *      @OA\Response(
     *          response = 401,
     *          description = "Пользователь не авторизован"
     *      )
     *  )
     */
    public function logout(): void
    {
        $this->manager->logOut();
    }

    /**
     * @param UserRequest $request
     * @return User
     *
     * @OA\Post(
     *      path = "/api/create",
     *      summary = "Токен",
     *      description = "Логин по токену",
     *      tags = {"Токен"},
     *
     *      @OA\Parameter(
     *          name = "firstName",
     *          in = "query",
     *           @OA\Schema(
     *              type = "string",
     *           )
     *       ),
     *      @OA\Parameter(
     *           name = "firstName",
     *           in = "query",
     *            @OA\Schema(
     *               type = "string",
     *            )
     *        ),
     *      @OA\Parameter(
     *           name = "firstName",
     *           in = "query",
     *            @OA\Schema(
     *               type = "string",
     *            )
     *        ),
     *      @OA\Response(
     *           response = 200,
     *           description = "Успешно",
     *       ),
     *      @OA\Response(
     *          response = 401,
     *          description = "Пользователь не авторизован"
     *      )
     *  )
     */
    public function createUser(UserRequest $request): User
    {
        $createSettings = $request->validate([
            'firstName' => ['required', 'max:255'],
            'lastName' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
        ]);
        $userDTO = new UserDTO(...$createSettings);
        return $this->manager->create($userDTO);
    }

}
