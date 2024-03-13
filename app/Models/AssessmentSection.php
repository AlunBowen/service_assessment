<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentSection extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
