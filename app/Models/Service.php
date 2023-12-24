<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function assessment(): HasOne
    {
        return $this->hasOne(Assessment::class, 'service_id');
    }
}
