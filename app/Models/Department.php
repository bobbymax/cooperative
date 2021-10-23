<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Department"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="name", type="string", example="Human Resources Department"),
 * @OA\Property(property="label", type="string", example="Human Resources"),
 * @OA\Property(property="code", type="string", example="HRM"),
 * @OA\Property(property="type", type="string", enum={"directorate", "division", "department", "unit"}, example="Department"),
 * @OA\Property(property="parentId", type="integer", example="66"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Department
 *
 */
class Department extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function staffs()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parentId');
    }

    public function modules()
    {
        return $this->morphToMany(Module::class, 'moduleable');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
