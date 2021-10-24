<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Setting"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="key", type="string", example="Mobilisation Percentage"),
 * @OA\Property(property="display_name", type="string", example="Mobilisation Percentage"),
 *  @OA\Property(property="value", type="string", example="30"),
 *  @OA\Property(property="details", type="string", example=""),
 *  @OA\Property(property="input_type", type="string", example="text"),
 * @OA\Property(property="order", type="int", example="2"),
 * @OA\Property(property="group", type="string", example="Global Settings"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Setting
 *
 */
class Setting extends Model
{
    use HasFactory;

    protected $guarded = [''];
}
