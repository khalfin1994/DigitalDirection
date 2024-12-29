<?php

namespace App\Actions\v1\Post;

use App\Dto\v1\Authentication\RegisterDto;
use App\Models\User;

class ListAction
{
    public function execute(RegisterDto $dto)
    {
        $user =  User::create($dto->toArray());
        return $user->createToken('auth_token')->plainTextToken;
    }
}
