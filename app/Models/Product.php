<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Product"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="category_id", type="integer", example="05"),
 * @OA\Property(property="department_id", type="integer", example="05"),
 * @OA\Property(property="company_id", type="integer", example="05"),
 * @OA\Property(property="brand_id", type="integer", example="05"),
 * @OA\Property(property="title", type="string", example="Category Name"),
 * @OA\Property(property="label", type="string",   example="label"),
 * @OA\Property(property="description", type="string",   example="description"),
 * @OA\Property(property="quantity", type="integer",   example="34"),
 * @OA\Property(property="value", type="number", format="double", example="34.4"),
 * @OA\Property(property="expiration", type="int", example="2"),
 * @OA\Property(property="measure", type="string", enum={"days", "weeks", "months", "years" }, example= "years") ,
 * @OA\Property(property="status", type="string", enum={"pending", "registered", "verification", "out-of-stock"}, example= "out-of-stock") ,
 * @OA\Property(property="inStock", type="boolean", example= "true") ,
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Product
 *
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
