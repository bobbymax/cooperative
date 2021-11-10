<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Procedure"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="document_id", type="integer", example="05"),
 * @OA\Property(property="work_flow_id", type="integer", example="05"),
 * @OA\Property(property="status", type="string", example= "status"),
 * @OA\Property(property="started", type="boolean", example="true"),
 * @OA\Property(property="closed", type="boolean", example="false"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Procedure
 *
 */
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
