<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function questions()
    {
        return $this->morphMany(Survey::class, 'surveyable');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
