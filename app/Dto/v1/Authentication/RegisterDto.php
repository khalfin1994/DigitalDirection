<?php

namespace App\Dto\v1\Authentication;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;


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
