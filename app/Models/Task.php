<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function timeline()
    {
        return $this->morphOne(Timeline::class, 'timelineable');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
