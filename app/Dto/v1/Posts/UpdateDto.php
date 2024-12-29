<?php

namespace App\Dto\v1\Posts;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Symfony\Component\HttpFoundation\File\UploadedFile;


#[MapName(SnakeCaseMapper::class)]
class UpdateDto extends Data
{
    #[Rule(['nullable', 'string', 'max:100'])]
    public ?string $title;

    #[Rule(['nullable', 'string', 'max:255'])]
    public ?string $description;

    #[Rule(['nullable', 'max:512000'])]
    public ?UploadedFile $audio_file;
}
