<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'permissionable');
    }
}