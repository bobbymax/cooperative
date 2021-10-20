<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Permission"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="key", type="string", readOnly="true", description="User role", example= "2") ,
 * @OA\Property(property="module", ref="#/components/schemas/Module",description="List of Modules"),
 * @OA\Property(property="name", type="string", maxLength=32, example="Read"),
 * )
 * Class Permission
 *
 */
class Permission extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function roles()
    {
        return $this->morphedByMany(Role::class, 'permissionable');
    }
}
