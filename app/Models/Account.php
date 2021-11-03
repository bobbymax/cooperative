<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Account"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 *  @OA\Property(property="code", type="string", example="1"),
 * @OA\Property(property="bank_name", type="string", example="ACCESS BANK"),
 * @OA\Property(property="account_number", type="string", example="9283928371"),
 * @OA\Property(property="account_name", type="string", example="James Okoro"),
 * @OA\Property(property="wallet", type="number", format="double", example="232323.23"),
 * @OA\Property(property="entity", type="string", enum={"staff","organization","vendor"}, example="vendor"),
 * @OA\Property(property="accountable_id", type="integer", example="1"),
 * @OA\Property(property="accountable_type", type="string",  example="1"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Account
 *
 */
class Account extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function accountable()
    {
        return $this->morphTo();
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
