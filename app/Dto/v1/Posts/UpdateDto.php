<?php

namespace App\Dto\v1\Posts;

use App\Enums\StatusEnum;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UpdateDto extends Data
{
    #[Rule(['required', 'integer', 'min:1'])]
    public int $id;

    #[Rule(['nullable', 'string', 'max:100'])]
    public ?string $title;

    #[Rule(['nullable', 'string', 'max:255'])]
    public ?string $description;

    #[Enum(StatusEnum::class)]
    public ?StatusEnum $status;
}
