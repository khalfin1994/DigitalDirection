<?php

namespace App\FiltersAndSorting\Posts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PostsFilter implements Filter
{
    protected $propertyMap = [
        'title' => [
            'field' => 'title',
            'table' => 'posts',
        ],
        'status' => [
            'field' => 'status',
            'table' => 'posts',
        ],
    ];

    public function __invoke(Builder $query, $value, string $property)
    {
        if (!isset($this->propertyMap[$property])) {
            return;
        }

        $field = $this->propertyMap[$property]['field'];
        $table = $this->propertyMap[$property]['table'];

        if ($field === 'title') {
            $orderDirection = $value === 'desc' ? 'desc' : 'asc';
            $query->orderBy($field, $orderDirection);
        }

        if ($field === 'status') {
            if ($value === 'active') {
                $query->orderByRaw("FIELD(status, 'active', 'inactive')");
            } elseif ($value === 'inactive') {
                $query->orderByRaw("FIELD(status, 'inactive', 'active')");
            }
        }
    }
}
