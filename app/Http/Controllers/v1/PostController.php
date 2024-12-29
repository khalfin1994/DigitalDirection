<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Post\CreateAction;
use App\Dto\v1\Posts\CreateDto;
use App\Dto\v1\Posts\DeleteDto;
use App\Dto\v1\Posts\GetDto;
use App\Dto\v1\Posts\ListDto;
use App\Dto\v1\Posts\UpdateDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function create(CreateDto $dto, CreateAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    public function update(UpdateDto $dto, UpdateAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    public function list(ListDto $dto, ListAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    public function get(GetDto $dto, GetAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    public function delete(DeleteDto $dto, DeleteAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }
}
