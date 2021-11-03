<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function authorizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
