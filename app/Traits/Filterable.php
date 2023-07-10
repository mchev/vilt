<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Filter a result set.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  array<string, mixed>  $filters
     * @param  array<string>  $searchFields
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, array $filters = [], array $searchFields = []): Builder
    {

        // Search
        $query->when(isset($filters['search']), function (Builder $query) use ($filters, $searchFields) {
            $searchTerm = $filters['search'];
            $query->where(function (Builder $query) use ($searchTerm, $searchFields) {
                foreach ($searchFields as $field) {
                    $query->orWhere($field, 'like', "%{$searchTerm}%");
                }
            });
        });

        // Trashed
        $query->when(isset($filters['trashed']), function (Builder $query) use ($filters) {
            $trashed = $filters['trashed'];
            $query->withTrashed();

            if ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });

        // Order by
        $query->when(isset($filters['order_by'], $filters['order_direction']), function (Builder $query) use ($filters) {
            $orderBy = $filters['order_by'];
            $orderDirection = $filters['order_direction'];
            if (str_contains($orderBy, '.')) {
                [$relationship, $relationField] = explode('.', $orderBy, 2);
                $query->with($relationship)->orderBy("$relationship.$relationField", $orderDirection);
            } else {
                $query->orderBy($orderBy, $orderDirection);
            }
        });

        // Date range
        $query->when(isset($filters['start_date'], $filters['end_date']), function (Builder $query) use ($filters) {
            $startDate = $filters['start_date'];
            $endDate = $filters['end_date'];
            $query->whereBetween('created_at', [$startDate, $endDate]);
        });

        return $query;
    }
}
