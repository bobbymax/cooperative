<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Survey"),
 * @OA\Property(property="id", type="integer", example="75"),
 * @OA\Property(property="question", type="string", example="In what year was your company founded?"),
 * @OA\Property(property="category", type="string", enum={"multiple-choice","objectives","text","range-choice"} , example="multiple-choice"),
 * @OA\Property(property="max_range_number", type="integer", example="0"),
 * @OA\Property(property="score", type="integer", example="100"),
 * @OA\Property(property="type", type="string", enum={"general","technical","financial","survey", "feedback"} , example="feedback"),
 * @OA\Property(property="surveyable_id", type="integer", example="75"),
 * @OA\Property(property="surveyable_type", type="string", example="surveyable type"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Survey
 *
 */
class Survey extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function surveyable()
    {
        return $this->morphTo();
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
