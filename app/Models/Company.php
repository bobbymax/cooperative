<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function team()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function projects()
    {
        return $this->hasManyThrough(Project::class, Bid::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function submissions()
    {
        return $this->hasManyThrough(Submission::class, Bid::class);
    }

    public function accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }
}
