<?php

namespace App\Dto\v1\Posts;

use App\Enums\StatusEnum;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[Schema(
    schema: 'Post_Update_Dto',
    properties: [
        new Property(
            property: 'id',
            description: 'Id поста',
            type: 'integer',
            example: 1,
        ),
        new Property(
            property: 'title',
            description: 'Заголовок',
            type: 'string',
            example: 'Плохой пост',
        ),
        new Property(
            property: 'description',
            description: 'Описание',
            type: 'string',
            example: 'Описание плохого поста',
        ),
        new Property(
            property: 'status',
            description: 'Статус',
            type: 'string',
            example: 'inactive',
        ),
        new Property(
            property: 'tag_ids',
            description: 'Передача одного или более tag_id',
            type: 'array',
            items: new Items(
                description: 'Идентификатор тега',
                type: 'integer'
            ),
            example: [1, 2, 3],
        ),
    ],
)]
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

    #[Rule(['nullable', 'array', 'min:1', 'exists:tags,id'])]
    public ?array $tag_ids;
}
