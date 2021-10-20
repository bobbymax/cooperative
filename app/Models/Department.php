<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function staffs()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parentId');
    }

    public function modules()
    {
        return $this->morphToMany(Module::class, 'moduleable');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
