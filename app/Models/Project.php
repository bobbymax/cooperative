<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Project"),
 * @OA\Property(property="id", type="integer", example="75"),
 * @OA\Property(property="sub_budget_id", type="integer", example="15"),
 * @OA\Property(property="service_category_id", type="integer", example="25"),
 * @OA\Property(property="department_id", type="integer", example="505"),
 * @OA\Property(property="title", type="string", example="Dam Project at Minna"),
 * @OA\Property(property="label", type="string", example= "Dam Project") ,
 * @OA\Property(property="reference_no", type="string", example="RF108AC"),
 * @OA\Property(property="duration", type="integer", example="4"),
 * @OA\Property(property="measurein", type="string", enum={"days","weeks","months","years"} , example="years"),
 * @OA\Property(property="description", type="string", example= "Dam Project"),
 * @OA\Property(property="location", type="string", example= "Abuja"),
 * @OA\Property(property="coordinates", type="string", example= "20.232304 , 32.323428") ,
 * @OA\Property(property="proposed_amount", type="number", format="double" , example="50003490.45"),
 * @OA\Property(property="evaluated_amount", type="number", format="double" , example="50003490.45"),
 * @OA\Property(property="approved_amount", type="number", format="double" , example="50003490.45"),
 * @OA\Property(property="awarded", type="boolean", example="False"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Project
 *
 */
class Project extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function questions()
    {
        return $this->morphMany(Survey::class, 'surveyable');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
