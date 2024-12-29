<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Authentication\LoginAction;
use App\Actions\v1\Authentication\RegisterAction;
use App\Dto\v1\Authentication\LoginDto;
use App\Dto\v1\Authentication\RegisterDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class AuthController extends Controller
{
    #[Post(
        path: '/register',
        summary: 'Регистрация',
        security: [["Bearer" => []]],
        requestBody: new RequestBody(content: [
            new JsonContent(
                ref: '#/components/schemas/Auth_Register_Dto',
            ),
        ]),
        tags: ['Auth'],
        responses: [
            new Response(
                response: 200,
                description: 'Получаем токен',
            ),
            new Response(
                response: 422,
                description: 'Wrong input data',
            ),
        ],
    )]
    public function register(RegisterDto $dto, RegisterAction $action): JsonResponse
    {
        $user = $action->execute($dto);
        return response()->json($user);
    }

    #[Post(
        path: '/login',
        summary: 'Авторизация',
        security: [["Bearer" => []]],
        requestBody: new RequestBody(content: [
            new JsonContent(
                ref: '#/components/schemas/Auth_Login_Dto',
            ),
        ]),
        tags: ['Auth'],
        responses: [
            new Response(
                response: 200,
                description: 'Получаем токен',
            ),
            new Response(
                response: 422,
                description: 'Wrong input data',
            ),
        ],
    )]
    public function login(LoginDto $dto, LoginAction $action): JsonResponse
    {
        $token = $action->execute($dto);

        if ($token === null) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Invalid credentials provided.'
            ], 401);
        }

        return response()->json([
            'token' => $token,
        ]);
    }
}
