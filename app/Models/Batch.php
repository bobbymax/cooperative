<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Batch"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="user_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="sub_budget_id", type="integer",  example="1"),
 * @OA\Property(property="department_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="amount", type="number", format="double", example="23902323.23"),
 * @OA\Property(property="no_of_payments", type="integer", example="1"),
 * @OA\Property(property="entity", type="string", enum={"pending", "registered", "cleared", "queried", "paid", "archived"}, example="paid"),
 * @OA\Property(property="paid", type="boolean", example="1"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Batch
 *
 */
class Batch extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function controller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function subBudgetHead()
    {
        return $this->belongsTo(SubBudgetHead::class, 'sub_budget_head_id');
    }

    public function journal()
    {
        return $this->hasOne(Journal::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
