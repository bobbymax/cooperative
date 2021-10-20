<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function accountable()
    {
        return $this->morphTo();
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
