<?php

namespace App\Actions\v1\Post;

use App\Dto\v1\Posts\UpdateDto;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;

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

            $post->update($data);

            return $post;
        }

        return false;
    }
}
