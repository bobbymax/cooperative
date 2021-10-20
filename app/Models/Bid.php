<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Bid"),
 * @OA\Property(property="project_id", type="integer", example="05"),
 * @OA\Property(property="company_id", type="integer", example="505"),
 * @OA\Property(property="amount", type="number", format="double" , example="50003490.45"),
 * @OA\Property(property="proposal", type="string", example="Link to document"),
 * @OA\Property(property="invite", type="string", example= "link to document") ,
 * @OA\Property(property="technical_document", type="string", example="link to document"),
 * @OA\Property(property="financial_document", type="string", example="link to document"),
 * @OA\Property(property="description", type="string", example="Water dam project at minna"),
 * @OA\Property(property="score", type="integer", example="100"),
 * @OA\Property(property="status", type="string", enum={"registered","draft","invitation","tenders","closed"} , example="Tenders"),
 *  @OA\Property(property="awarded", type="boolean", example="False"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Bid
 *
 */
class Bid extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
