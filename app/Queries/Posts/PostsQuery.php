<?php

namespace App\Queries\Posts;

use App\Dto\v1\Posts\ListDto;
use App\FiltersAndSorting\Posts\PostsFilter;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PostsQuery extends QueryBuilder
{
    public function __construct(Builder $query, ListDto $dto)
    {
        parent::__construct($query);

        $query->where(function ($q) use ($dto) {
            $fields = ['title', 'description'];
            $searchValues = preg_split('/\s+/', $dto->search);

            $q->where('title', 'like', '%' . $dto->search . '%');

            foreach ($fields as $field) {
                foreach ($searchValues as $value) {
                    $q->orWhere($field, 'like', '%' . $value . '%');
                }
            }
        });

        if ($dto->sortBy) {
            $direction = in_array($dto->sortDirection, ['asc', 'desc']) ? $dto->sortDirection : 'asc';
            $query->orderBy($dto->sortBy, $direction);
        }

        if ($dto->tag) {
            $query->whereHas('tags', function ($q) use ($dto) {
                $q->where('name', 'like', '%' . $dto->tag . '%');
            });
        }

        $this->allowedSorts(['title', 'status']);
        $this->allowedFilters([
            AllowedFilter::custom('title', new PostsFilter()),
            AllowedFilter::custom('status', new PostsFilter()),
        ]);
    }
}
