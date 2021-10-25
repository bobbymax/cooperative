<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="AccountCode"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 *  @OA\Property(property="account_chart_id", type="integer", example="1"),
 * @OA\Property(property="name", type="string", example="12"),
 * @OA\Property(property="label", type="string", example="144"),
 * @OA\Property(property="code", type="string", example="urjd93"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class AccountCode
 *
 */
class AccountCode extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
