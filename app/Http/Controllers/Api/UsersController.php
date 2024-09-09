<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\JWTRequest;
use App\Http\Requests\UserRequest;
use App\Domain\Users\UsersManager;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;


class UsersController extends Controller
{
    public function __construct(
        private  UsersManager $manager
    ) {
    }

    /**
     * @param JWTRequest $jwt
     * @return string
     *
     * @throws Exception
     *
     *
     * @OA\PathItem(path = "/api/code-jwt")
     *
     * @OA\Info(
     *       title = "API документация",
     *       version = "1.0.0"
     *   )
     * @OA\Post(
     *      path = "/api/code-jwt",
     *      summary = "Токен",
     *      description = "Получить токен",
     *      tags = {"Токен"},
     *
     *      @OA\Parameter(
     *          name = "[user]first_name",
     *          in = "query",
     *          description = "Имя",
     *           @OA\Schema(
     *              type = "string",
     *              default = "test"
     *           )
     *       ),
     *       @OA\Parameter(
     *          name = "[user]last_name",
     *          in = "query",
     *          description = "Фамилия",
     *          @OA\Schema(
     *              type = "string",
     *              default = "test"
     *            )
     *        ),
     *       @OA\Parameter(
     *          name = "[user]email",
     *          in = "query",
     *          description = "Почта",
     *          @OA\Schema(
     *              type = "string",
     *              default = "test@test.com",
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
    public function codeJWT(JWTRequest $jwt)
    {
        return $this->manager->codeJWT($jwt->user);
    }

    public function decodeJWT(JWTRequest $jwt)
    {
        return $this->manager->decodeJWT($jwt->token);
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

}
