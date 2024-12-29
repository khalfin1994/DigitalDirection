<?php

namespace App\Dto\v1\Authentication;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;


#[Schema(
    schema: 'Auth_Register_Dto',
    properties: [
        new Property(
            property: 'email',
            description: 'Емайл',
            type: 'string',
            example: 'example@ex.com',
        ),
        new Property(
            property: 'name',
            description: 'Имя',
            type: 'string',
            example: 'John Doe',
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
class RegisterDto extends LoginDto
{
    #[Rule(['required', 'string', 'email', 'Unique:users'])]
    public string $email;

    #[Rule(['required', 'string', 'max:255'])]
    public string $name;

    #[Password(min: 6, letters: true, numbers: true)]
    public string $password;
}
