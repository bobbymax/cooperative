<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Company"),
 * @OA\Property(property="id", type="integer", example="05"),
 * @OA\Property(property="service_category_id", type="integer", example="05"),
 * @OA\Property(property="name", type="string", example="Company Name"),
 * @OA\Property(property="label", type="string", example="Company Label"),
 * @OA\Property(property="reference_no", type="string", example="38929838AF"),
 * @OA\Property(property="email", type="string", example= "user@email.com") ,
 * @OA\Property(property="mobile", type="string", example="+23481278279"),
 * @OA\Property(property="address", type="string", example="Company Address"),
 * @OA\Property(property="profile", type="string", example="link to document"),
 * @OA\Property(property="status", type="string", enum={"registered","approved","denied"} , example="Approved"),
 *  @OA\Property(property="blacklisted", type="boolean", example="False"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Company
 *
 */

class Company extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function uploads()
    {
        return $this->morphMany(Upload::class, 'uploadable');
    }

    public function team()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function projects()
    {
        return $this->hasManyThrough(Project::class, Bid::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function submissions()
    {
        return $this->hasManyThrough(Submission::class, Bid::class);
    }

    public function accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
