<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Requisition"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="user_id", type="integer", example="05"),
 * @OA\Property(property="department_id", type="integer", example="05"),
 * @OA\Property(property="reference_no", type="string", example="ASR05"),
 * @OA\Property(property="description", type="string", example="Requisition Desription"),
 * @OA\Property(property="type", type="string", enum={"purchase", "request"}, example="Category Name"),
 * @OA\Property(property="status", type="string",  enum={"pending", "approved", "declined"}, example="label"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Requisition
 *
 */
class Requisition extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function requisitor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
