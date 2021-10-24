<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Task"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="user_id", type="integer", readOnly="true", example="12"),
 * @OA\Property(property="department_id", type="integer", readOnly="true", example="144"),
 * @OA\Property(property="title", type="string", example="Supply Water Pipes"),
 * @OA\Property(property="label", type="string", example="Supply water pipes"),
 * @OA\Property(property="reference_no", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="duration", type="integer", example="5"),
 *  @OA\Property(property="start_date", type="date", example="30"),
 *  @OA\Property(property="expiry", type="date", example="2020-10-20"),
 *  @OA\Property(property="date_completed", type="date", example="2020-10-20"),
 *  @OA\Property(property="description", type="string", example="Task Description"),
 * @OA\Property(property="measure", type="string", enum={"minutes","hours","days","weeks","months","years"}, example="minutes"),
 *  @OA\Property(property="status", type="string", enum={"pending","in-progress","in-review","fulfilled","overdue"}, example="overdue"),
 * @OA\Property(property="closed", type="boolean", example="True"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Task
 *
 */
class Task extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function timeline()
    {
        return $this->morphOne(Timeline::class, 'timelineable');
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
