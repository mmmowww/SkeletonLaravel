<?php

namespace App\Http\Controllers\Api;

use App\Domain\JWT\JWTManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\JWTRequest;

class JWTController extends Controller
{
    public function __construct(
        private JWTManager $manager
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

    /**
     * @param JWTRequest $jwt
     * @return string
     *
     * @throws Exception
     *
     *
     * @OA\PathItem(path = "/api/decode-jwt")
     *
     * @OA\Post(
     *      path = "/api/decode-jwt",
     *      summary = "Токен",
     *      description = "Декодировать токен",
     *      tags = {"Токен"},
     *
     *      @OA\Parameter(
     *          name = "token",
     *          in = "query",
     *          description = "токен",
     *           @OA\Schema(
     *              type = "string",
     *              default = "test"
     *           )
     *       ),
     *      @OA\Response(
     *           response = 200,
     *           description = "Успешно",
     *       ),
     *      @OA\Response(
     *          response = 401,
     *          description = "Пользователь не авторизован"
     *      ),
     *  )
     */
    public function decodeJWT(JWTRequest $jwt)
    {
        return $this->manager->decodeJWT($jwt->token);
    }
}

