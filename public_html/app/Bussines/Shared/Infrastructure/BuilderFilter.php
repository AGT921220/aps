<?php

namespace App\Bussines\Shared\Infrastructure;

use Illuminate\Database\Eloquent\Builder;

class BuilderFilter
{
    public function __invoke(Builder $builder, array $filters)
    {
        foreach ($filters as $filter) {
            $builder = $this->selectOperator($builder, $filter['operator'], $filter['field'], $filter['value']);
        }
        return $builder;
    }

    private function selectOperator(Builder $builder, string $operator, string $field, $value): Builder
    {
        switch ($operator) {
            case 'where':
                return $builder->where($field, $value);
                break;
            case 'wherenotin':
                return $builder->whereNotIn($field, $value);
                break;
            case 'like':
                return $builder->where($field, 'LIKE', "%".$value."%");
                break;

            default:
                # code...
                break;
        }
    }
}
