<?php

namespace App\Dto\v1\Posts;

use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Schema(
    schema: 'Post_Create_Dto',
    properties: [
        new Property(
            property: 'title',
            description: 'Заголовок',
            type: 'string',
            example: 'Хороший пост',
        ),
        new Property(
            property: 'description',
            description: 'Описание',
            type: 'string',
            example: 'Описание хорошего поста',
        ),
        new Property(
            property: 'audio_file',
            description: 'mp3 файл',
            type: 'string',
            example: 'file.mp3',
        ),
        new Property(
            property: 'tag_ids[0]',
            description: 'Передача одного или более tag_id',
            type: 'numeric',
            example: 1,
        ),
        new Property(
            property: 'tag_ids[1]',
            description: 'Передача одного или более tag_id',
            type: 'numeric',
            example: 2,
        ),
        new Property(
            property: 'tag_ids[2]',
            description: 'Передача одного или более tag_id',
            type: 'numeric',
            example: 3,
        ),
    ],
)]
#[MapName(SnakeCaseMapper::class)]
class CreateDto extends Data
{
    #[Rule(['required', 'string', 'max:100'])]
    public string $title;

    #[Rule(['required', 'string', 'max:1000'])]
    public string $description;

    #[Rule(['required', 'mimes:mp3', 'max:256000'])]
    public UploadedFile $audio_file;

    #[Rule(['required', 'array', 'min:1', 'exists:tags,id'])]
    public array $tag_ids;
}
