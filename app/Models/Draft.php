<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Draft"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="user_id", type="integer", example="05"),
 * @OA\Property(property="document_id", type="integer", example="05"),
 * @OA\Property(property="remark", type="string", example="Remark"),
 * @OA\Property(property="status", type="string", enum={"pending", "approved", "denied"}, example="pending"),
 * @OA\Property(property="closed", type="boolean", example ="true"),
 *   @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Draft
 *
 */
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
