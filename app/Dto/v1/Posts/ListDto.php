<?php

namespace App\Dto\v1\Posts;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;


#[MapName(SnakeCaseMapper::class)]
class ListDto extends Data
{
    #[Rule(['nullable', 'string', 'max:255'])]
    public ?string $search;

    #[Rule(['nullable', 'string', 'max:255'])]
    public ?string $tag;

    #[Rule(['integer', 'min:1'])]
    public ?int $page = 1;

    #[Rule(['integer', 'min:1'])]
    public ?int $per_page = 10;

    #[Rule(['nullable', 'string', 'max:255'])]
    public ?string $sortBy;

    #[Rule(['nullable', 'in:asc,desc'])]
    public ?string $sortDirection = 'asc';
}
