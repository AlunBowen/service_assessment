<?php

namespace App\Models;

use App\Models\Scopes\ServiceScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Service extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope(new ServiceScope);
    }

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function attempt(): HasOne
    {
        return $this->hasOne(Attempt::class, 'service_id');
    }


}
