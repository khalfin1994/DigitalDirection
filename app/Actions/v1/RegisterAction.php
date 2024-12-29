<?php

namespace App\Actions\v1;

use App\Dto\v1\Authentication\RegisterDto;
use App\Models\User;

class RegisterAction
{
    public function execute(RegisterDto $dto)
    {
        $user =  User::create($dto->toArray());
        return $user->createToken('auth_token')->plainTextToken;
    }
}
