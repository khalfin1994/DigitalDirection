<?php

namespace App\Dto\v1\Authentication;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\Validation\Rule;

#[Schema(
    schema: 'Auth_Login_Dto',
    properties: [
        new Property(
            property: 'email',
            description: 'Емайл',
            type: 'string',
            example: 'example@ex.com',
        ),
        new Property(
            property: 'password',
            description: 'Пароль',
            type: 'string',
            example: 'password1',
        ),
    ],
)]
#[MapName(SnakeCaseMapper::class)]
class LoginDto extends Data
{

    #[Rule(['required', 'string'])]
    public string $email;

    #[Rule(['required', 'string'])]
    public string $password;
}
