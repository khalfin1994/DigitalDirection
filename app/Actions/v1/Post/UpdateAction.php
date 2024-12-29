<?php

namespace App\Actions\v1\Post;


use App\Actions\v1\Media\AudioFileCompressionAction;
use App\Dto\v1\Posts\UpdateDto;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UpdateAction
{
    /**
     * @throws Exception
     */
    public function execute(UpdateDto $dto)
    {
        $post = Post::findOrFail($dto->id);

        if ($post->user_id == Auth::id()) {
            $data = $dto->toArray();

            $data = array_filter($data, fn($value) => $value !== null);

            if ($dto->audio_file) {
                $audioCompressionService = new AudioFileCompressionAction();
                $audioFilePath = Storage::disk('local')->putFile('public/files', $dto->audio_file);

                $compressedFilePath = $audioCompressionService->compress($audioFilePath);

                $data['audio_file'] = Storage::disk('local')->putFile('public/files/compressed', new File($compressedFilePath));
            }

            $post->update($data);

            return $post;
        }

        return false;
    }
}
