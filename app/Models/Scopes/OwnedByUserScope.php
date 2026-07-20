<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * Restricts a model's queries to records owned by the authenticated user,
 * unless that user holds the super_admin role, who can see everything.
 */
class OwnedByUserScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (! auth()->check() || auth()->user()->hasRole('super_admin')) {
            return;
        }

        $builder->where($model->qualifyColumn('user_id'), auth()->id());
    }
}
