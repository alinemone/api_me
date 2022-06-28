<?php

namespace App\Models\GlobalScopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class IsNotExpired implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->whereDate($model::EXPIRED_AT, '>=', Carbon::now());
    }
}
