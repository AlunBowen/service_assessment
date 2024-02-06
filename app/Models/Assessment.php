<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Scopes\AssessmentScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assessment extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope(new AssessmentScope);
    }
   
    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function sections()
    {
        return $this->hasMany(AssessmentSection::class);
    }
}
