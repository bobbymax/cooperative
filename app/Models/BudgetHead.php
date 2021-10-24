<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="BudgetHead"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="code", type="string", example="BSG/34/21"),
 * @OA\Property(property="name", type="string", example="ICT Budget"),
 * @OA\Property(property="description", type="string", example="Budget Description"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class BudgetHead
 *
 */

class BudgetHead extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function subBudgetHeads()
    {
        return $this->hasMany(SubBudgetHead::class);
    }
}
