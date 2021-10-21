<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="WorkFlow"),
 * @OA\Property(property="id", type="integer",  example="1"),
 * @OA\Property(property="module_id", type="integer",  example="1"),
 * @OA\Property(property="name", type="string", example="Leave Application"),
 * @OA\Property(property="label", type="string", example="Leave Application"),
 * @OA\Property(property="type", type="string", enum={"sequence", "broadcast"}, example="sequence"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class WorkFlow
 *
 */
class WorkFlow extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
