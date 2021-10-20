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

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }

    public function expenditures()
    {
        return $this->morphMany(Expenditure::class, 'expenditureable');
    }
}
