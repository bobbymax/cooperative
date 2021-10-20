<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Variation"),
 * @OA\Property(property="id", type="integer",  example="1"),
 * @OA\Property(property="survey_id", type="integer",  example="1"),
 * @OA\Property(property="possible_answer", type="string", example="True"),
 * @OA\Property(property="score", type="integer", example="20"),
 * @OA\Property(property="correct", type="boolean", example="true"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Variation
 *
 */

class Variation extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
