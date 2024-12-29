<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\LoginAction;
use App\Actions\v1\RegisterAction;
use App\Dto\v1\Authentication\LoginDto;
use App\Dto\v1\Authentication\RegisterDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterDto $dto, RegisterAction $action): JsonResponse
    {
        $user = $action->execute($dto);
        return response()->json($user);
    }

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
