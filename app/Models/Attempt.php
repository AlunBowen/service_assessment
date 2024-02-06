<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    public function assessment()
    {
        return $this->belongsTo('App\Models\Assessment');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
    
}
