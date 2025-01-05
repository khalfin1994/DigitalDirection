<?php

namespace App\Actions\v1\Post;

use App\Actions\v1\Media\AudioFileCompressionAction;
use App\Dto\v1\Posts\CreateDto;
use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreateAction
{
    public function execute(CreateDto $dto)
    {
        $audioCompressionService = new AudioFileCompressionAction();

        $audioFilePath = Storage::disk('local')->putFile('original', $dto->audio_file);

        $compressedFilePath = $audioCompressionService->compress($audioFilePath);

        $post = Post::create([
            'title'   => $dto->title,
            'description' => $dto->description,
            'audio_file' => Storage::disk('local')->putFile('files/compressed', new File($compressedFilePath)),
            'user_id'   => Auth::id(),
        ]);

        $post->tags()->attach($dto->tag_ids, [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $post;
    }
}
