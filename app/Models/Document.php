<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function docType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    public function template()
    {
        return $this->belongsTo(DocumentTemplate::class, 'document_template_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function documentable()
    {
        return $this->morphTo();
    }

    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }

    public function procedure()
    {
        return $this->hasOne(Procedure::class);
    }
}
