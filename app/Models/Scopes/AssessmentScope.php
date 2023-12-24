<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AssessmentScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->check()) {

            if (auth()->user()->hasRole('super-admin')){
                $builder;
                error_log('super-admin');
                
            } 
            else{
                
                $builder->where('organisation_id', auth()->user()->organisation_id);
                };
            }
            
        }
    };

