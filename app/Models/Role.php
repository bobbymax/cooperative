<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Role"),
 * @OA\Property(property="role_id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="role", type="string", readOnly="true", description="User role", example= "ICT Admin") ,
 * @OA\Property(property="grade_level_id", type="string", maxLength=32, example="32"),
 * @OA\Property(property="group", type="string", maxLength=32, example="Directors")
 *
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
