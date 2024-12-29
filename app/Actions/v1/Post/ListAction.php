<?php

namespace App\Actions\v1\Post;

use App\Dto\v1\Posts\ListDto;
use App\Http\Resources\v1\PostResource;
use App\Models\Post;
use App\Queries\Posts\PostsQuery;

class ListAction
{
    public function execute(ListDto $dto)
    {
        $query = new PostsQuery(Post::query()->with('tags'), $dto);
        $posts = $query->paginate(!empty($dto->per_page) ? $dto->per_page : 10);

        return [
            'posts' => PostResource::collection($posts),
            'pagination' => [
                'total' => $posts->total(),
                'count' => $posts->count(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'total_pages' => $posts->lastPage()
            ]
        ];
    }
}
