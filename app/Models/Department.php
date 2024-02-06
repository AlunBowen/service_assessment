<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
