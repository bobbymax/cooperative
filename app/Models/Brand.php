<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Brand"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="name", type="string", example="Raaxo Synergy"),
 * @OA\Property(property="label", type="string", example="Label"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Brand
 *
 */
class Brand extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
