<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrganisationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->check()) {

            if (auth()->user()->hasPermissionTo('manage organisations')){
                $builder;
                
            } 
            else{
                $builder->where('id', auth()->user()->organisation_id);
               
            }
            
        }
    }
}
