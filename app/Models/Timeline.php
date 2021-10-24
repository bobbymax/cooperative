<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Timeline"),
 * @OA\Property(property="timelineable_id", type="integer", example="08"),
 * @OA\Property(property="timelineable_type", type="string", example="Timelineable type"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Timeline
 *
 */
class Timeline extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function timelineable()
    {
        return $this->morphTo();
    }
}
