<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Post\CreateAction;
use App\Actions\v1\Post\DeleteAction;
use App\Actions\v1\Post\GetAction;
use App\Actions\v1\Post\ListAction;
use App\Actions\v1\Post\UpdateAction;
use App\Dto\v1\Posts\CreateDto;
use App\Dto\v1\Posts\DeleteDto;
use App\Dto\v1\Posts\GetDto;
use App\Dto\v1\Posts\ListDto;
use App\Dto\v1\Posts\UpdateDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\RequestBody;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\Schema;

class PostController extends Controller
{
    #[Post(
        path: '/post',
        summary: 'Создание поста',
        security: [["Bearer" => []]],
        requestBody: new RequestBody(content: [
            new JsonContent(
                ref: '#/components/schemas/Post_Create_Dto',
            ),
        ]),
        tags: ['Posts'],
        responses: [
            new Response(
                response: 200,
                description: 'Данные поста',
            ),
            new Response(
                response: 422,
                description: 'Wrong input data',
            ),
        ],
    )]
    public function create(CreateDto $dto, CreateAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    #[Put(
        path: '/post',
        summary: 'Обновление данных поста',
        security: [["Bearer" => []]],
        requestBody: new RequestBody(content: [
            new JsonContent(
                ref: '#/components/schemas/Post_Update_Dto',
            ),
        ]),
        tags: ['Posts'],
        responses: [
            new Response(
                response: 200,
                description: 'Данные поста',
            ),
            new Response(
                response: 422,
                description: 'false',
            ),
        ],
    )]
    public function update(UpdateDto $dto, UpdateAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    #[Get(
        path: '/posts',
        summary: 'Список постов',
        security: [["Bearer" => []]],
        tags: ['Posts'],
        parameters: [
            new Parameter(
                name: 'search',
                description: 'Поисковый запрос',
                in: 'query',
                schema: new Schema(
                    type: 'string',
                    example: 'example',
                ),
            ),
            new Parameter(
                name: 'page',
                description: 'Страница',
                in: 'query',
                schema: new Schema(
                    type: 'number',
                    example: 1,
                ),
            ),
            new Parameter(
                name: 'per_page',
                description: 'Записей на странице',
                in: 'query',
                schema: new Schema(
                    type: 'number',
                    example: 10,
                ),
            ),
            new Parameter(
                name: 'sortBy',
                description: 'Сортировка',
                in: 'query',
                schema: new Schema(
                    type: 'string',
                    example: 'status',
                ),
            ),
            new Parameter(
                name: 'tag',
                description: 'Фильтрации по названию тега',
                in: 'query',
                schema: new Schema(
                    type: 'string',
                    example: 'consequatur',
                ),
            ),
        ],
        responses: [
            new Response(
                response: 200,
                description: 'Список постов',
            ),
            new Response(
                response: 422,
                description: 'Wrong input data',
            ),
        ],
    )]
    public function list(ListDto $dto, ListAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    #[Get(
        path: '/post',
        summary: 'Получение поста',
        security: [["Bearer" => []]],
        tags: ['Posts'],
        parameters: [
            new Parameter(
                name: 'id',
                description: 'Id поста',
                in: 'query',
                schema: new Schema(
                    type: 'number',
                    example: 1,
                ),
            )
        ],
        responses: [
            new Response(
                response: 200,
                description: 'Данные поста',
            ),
            new Response(
                response: 422,
                description: 'Wrong input data',
            ),
        ],
    )]
    public function get(GetDto $dto, GetAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }

    #[Put(
        path: '/post/delete',
        summary: 'Удаление поста',
        security: [["Bearer" => []]],
        requestBody: new RequestBody(content: [
            new JsonContent(
                ref: '#/components/schemas/Post_Remove_Dto',
            ),
        ]),
        tags: ['Posts'],
        responses: [
            new Response(
                response: 200,
                description: 'true',
            ),
            new Response(
                response: 422,
                description: 'false',
            ),
        ],
    )]
    public function delete(DeleteDto $dto, DeleteAction $action): JsonResponse
    {
        $post = $action->execute($dto);
        return response()->json($post);
    }
}
