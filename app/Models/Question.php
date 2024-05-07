<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function assessmentSection()
    {
        return $this->belongsTo(AssessmentSection::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
