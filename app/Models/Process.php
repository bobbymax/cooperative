<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Process"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="work_flow_id", type="integer", example="02"),
 * @OA\Property(property="group_id", type="integer", example="05"),
 * @OA\Property(property="order", type="integer", example="05"),
 * @OA\Property(property="remark", type="string", example="Excellent"),
 * @OA\Property(property="status", type="string", example="pending"),
 *  @OA\Property(property="closed", type="boolean", example="False"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Company
 *
 */

class Process extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function workFlow()
    {
        return $this->belongsTo(WorkFlow::class, 'work_flow_id');
    }
}
