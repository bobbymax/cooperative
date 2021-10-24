<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="ServiceCategory"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", example="ICT"),
 * @OA\Property(property="label", type="string", example="ICT"),
 * @OA\Property(property="description", type="string", example= "ICT Services") ,
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class ServiceCategory
 *
 */
class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
