<?php

namespace App\Actions\v1\Post;


use App\Dto\v1\Posts\DeleteDto;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DeleteAction
{
    public function execute(DeleteDto $dto)
    {
        $post = Post::findOrFail($dto->id);

        if ($post->user_id == Auth::id()) {
            return $post->delete();
        }

        return false;
    }
}
