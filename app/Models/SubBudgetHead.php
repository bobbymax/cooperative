<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 /**
 * @OA\Schema(
 * @OA\Xml(name="SubBudgetHead"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="budget_head_id", type="integer", example="15"),
 * @OA\Property(property="department_id", type="integer", example="01"),
 * @OA\Property(property="code", type="string", example="BSG/34/21"),
 * @OA\Property(property="name", type="string", example="Maintenance Budget"),
 * @OA\Property(property="description", type="string", example="Budget Description"),
 * @OA\Property(property="type", type="string", enum={"capital","overhead","personnel"} , example="personell"),
 * @OA\Property(property="active", type="boolean", example="True"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
*  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class SubBudgetHead
 *
 */
class SubBudgetHead extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function budgetHead()
    {
        return $this->belongsTo(BudgetHead::class, 'budget_head_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function funds()
    {
        return $this->hasMany(Fund::class);
    }

    public function getCurrentFund($year)
    {
        return $this->funds->where('budget_year', $year)->first();
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
