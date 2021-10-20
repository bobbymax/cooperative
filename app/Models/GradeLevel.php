<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="GradeLevel"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="key", type="string", example="ss5"),
 * @OA\Property(property="name", type="string", example="Senior Staff"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class GradeLevel
 *
 */
class GradeLevel extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
