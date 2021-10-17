<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function surveyable()
    {
        return $this->morphTo();
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
