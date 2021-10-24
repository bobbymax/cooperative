<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Group"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="name", type="string", example="Directors"),
 * @OA\Property(property="label", type="string", example="Directors"),
 * @OA\Property(property="expiry_date", type="date", example="2020-10-20"),
 * @OA\Property(property="cannot_expire", type="boolean", example="True"),
 * @OA\Property(property="deactivated", type="boolean", example="True"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 *
 * Class Group
 *
 */
class Group extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function users()
    {
        return $this->morphToMany(User::class, 'userable');
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'permissionable');
    }
}
