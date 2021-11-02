<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Allocation"),
 * @OA\Property(property="id", type="integer", example="1"),
 * @OA\Property(property="user_id", type="integer", example="1"),
 * * @OA\Property(property="item_id", type="integer", example="1"),
 * * @OA\Property(property="quantity", type="integer", example="1"),
 * @OA\Property(property="status", type="string", enum={"pending", "collected","end-of-cycle"}, example="pending"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Allocation
 *
 */
class Allocation extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
