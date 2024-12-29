<?php

namespace App\Dto\v1\Authentication;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Attributes\Validation\Rule;

#[MapName(SnakeCaseMapper::class)]
class LoginDto extends Data
{

    #[Rule(['required', 'string'])]
    public string $email;

    #[Rule(['required', 'string'])]
    public string $password;
}
