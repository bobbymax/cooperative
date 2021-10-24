<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 /**
 * @OA\Schema(
 * @OA\Xml(name="submissions"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="bid_id", type="integer", example="15"),
 * @OA\Property(property="survey_id", type="integer", example="01"),
 * @OA\Property(property="answer", type="string", example="Yes"),
 *  @OA\Property(property="sccore", type="integer", example="5"),
 * @OA\Property(property="favorite", type="boolean", example="True"),
 * @OA\Property(property="correct", type="boolean", example="True"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
*  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class submissions
 *
 */
class Submission extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function bid()
    {
        return $this->belongsTo(Bid::class, 'bid_id');
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
