<?php

namespace App\Actions\v1\Post;

use App\Dto\v1\Posts\GetDto;
use App\Models\Post;

class GetAction
{
    public function execute(GetDto $dto)
    {
        return Post::with(['tags:id,name'])->findOrFail($dto->id);
    }
}
