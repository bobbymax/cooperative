<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Role"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="label", type="string", example="Managing Director"),
 * @OA\Property(property="name", type="string", readOnly="true", description="User role", example= "ICT Admin") ,
 * @OA\Property(property="max_slots", type="integer", example="23"),
 * @OA\Property(property="start_date", type="date", example="2020-12-20"),
 * @OA\Property(property="expiry_date", type="date", example="2020-12-20"),
 * @OA\Property(property="cannot_expire", type="boolean", example="True"),
 * @OA\Property(property="isSuper", type="boolean", example="True"),
 *  @OA\Property(property="deactivated", type="boolean", example="False"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Role
 *
 */
class Role extends Model
{
    use HasFactory;

    protected $guarded = [''];


    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'permissionable');
    }

    public function grantPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

}
