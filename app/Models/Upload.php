<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Upload"),
 * @OA\Property(property="id", type="integer", example="75"),
 * @OA\Property(property="user_id", type="integer", example="75"),
 * @OA\Property(property="name", type="string", example="Company Profile"),
 * @OA\Property(property="path", type="string", example="Storage path"),
 * @OA\Property(property="ext", type="string", example="File Extension"),
 * @OA\Property(property="size", type="number", format="double" ,example="25.5"),
 * @OA\Property(property="uploadable_id", type="integer", example="1"),
 * @OA\Property(property="uploadable_type", type="string", example="Uploadable type"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * @OA\Property(property="deleted_at", type="date", example="2020-12-22"),
 * )
 * Class Upload
 *
 */
class Upload extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function uploadable()
    {
        return $this->morphTo();
    }
}
