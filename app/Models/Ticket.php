<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function concern()
    {
        return $this->belongsTo(Concern::class, 'concern_id');
    }
}
