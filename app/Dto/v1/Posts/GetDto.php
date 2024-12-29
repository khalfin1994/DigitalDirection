<?php

namespace App\Dto\v1\Posts;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;


#[MapName(SnakeCaseMapper::class)]
class GetDto extends Data
{
    #[Rule(['required', 'integer', 'min:1'])]
    public int $id;
}
