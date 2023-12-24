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
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }
}
