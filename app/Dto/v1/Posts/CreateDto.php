<?php

namespace App\Dto\v1\Posts;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
