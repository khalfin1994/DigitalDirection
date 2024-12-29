<?php

namespace App\Dto\v1\Posts;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[Schema(
    schema: 'Post_Remove_Dto',
    properties: [
        new Property(
            property: 'id',
            description: 'Id поста',
            type: 'number',
            example: 1
        )
    ],
)]
#[MapName(SnakeCaseMapper::class)]
class DeleteDto extends Data
{
    #[Rule(['required', 'integer', 'min:1'])]
    public int $id;
}
