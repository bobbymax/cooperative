<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="DocumentTemplate"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="name", type="string", example= "Requisition Form"),
 * @OA\Property(property="label", type="string", example="Label"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class DocumentTemplate
 *
 */
class DocumentTemplate extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
