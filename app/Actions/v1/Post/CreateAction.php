<?php

namespace App\Actions\v1\Post;

use App\Dto\v1\Posts\CreateDto;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreateAction
{
    public function execute(CreateDto $dto)
    {
        $post = Post::create([
            'title'   => $dto->title,
            'description' => $dto->description,
            'audio_file'   => Storage::putFile('files', $dto->audio_file),
            'user_id'   => Auth::id(),
        ]);

        return $post;
    }

}
