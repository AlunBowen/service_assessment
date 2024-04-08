<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['answers'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

   public function assessment()
   {
       return $this->belongsTo(Assessment::class);
   }

   public function service()
   {
       return $this->belongsTo(Service::class);
   }

   public function section()
   {
       return $this->belongsTo(AssessmentSection::class);
   }

    public function user()
    {
         return $this->belongsTo(User::class);
    }
}
