<?php

namespace App\Actions\v1\Authentication;

use App\Dto\v1\Authentication\LoginDto;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    public function execute(LoginDto $dto)
    {
        $user = User::where('email', $dto->email)->first();

        if (!$user || !Hash::check($dto->password, $user->password)) {
            return null;
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}
