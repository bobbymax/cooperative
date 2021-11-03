<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function workFlow()
    {
        return $this->belongsTo(WorkFlow::class, 'work_flow_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
