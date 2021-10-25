<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="AccountChart"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", example="12"),
 * @OA\Property(property="label", type="string", example="144"),
 * @OA\Property(property="min", type="integer", example="Supply Water Pipes"),
 * @OA\Property(property="max", type="integer", example="Supply water pipes"),
 * @OA\Property(property="active", type="boolean", example="1"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class AccountChart
 *
 */
class AccountChart extends Model
{
    use HasFactory;

    protected $guarded = [''];
}
