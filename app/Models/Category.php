<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Category"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="name", type="string", example="Category Name"),
 * @OA\Property(property="label", type="string",   example="label"),
 * @OA\Property(property="type", type="string", example="Category Type"),
 * @OA\Property(property="parentId", type="integer", example= "55") ,
 * @OA\Property(property="description", type="string", example="category description"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Category
 *
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Concern::class);
    }

    public function concerns()
    {
        return $this->hasMany(Concern::class);
    }
}
