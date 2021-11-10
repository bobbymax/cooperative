<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Document"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="user_id", type="integer", example="05"),
 * @OA\Property(property="document_template_id", type="integer", example="05"),
 * @OA\Property(property="title", type="string", example= "Requisition Form"),
 * @OA\Property(property="label", type="string", example="Label"),
 * @OA\Property(property="reference_no", type="string", example="HD379"),
 * @OA\Property(property="description", type="string", example="description"),
 * @OA\Property(property="documentable_id", type="integer", example="05"),
 * @OA\Property(property="status", type="string", enum={"pending", "registered", "in-review", "completed"}, example="05"),
 * @OA\Property(property="archived", type="boolean", example="true"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Document
 *
 */
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
