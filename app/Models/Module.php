<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use Illuminate\Support\Str;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Module"),
 * @OA\Property(property="id", type="integer", example="05"),
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
 * Class Module
 *
 */

class Module extends Model
{
    use HasFactory;

    protected $guarded = [''];

    private $modulePermissions = [];

    private function policyActions()
    {
        return ['Browse', 'Read', 'Edit', 'Add', 'Delete'];
    }

    public function departments()
    {
        return $this->morphedByMany(Department::class, 'moduleable');
    }

    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'permissionable');
    }

    public function addPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function grantDepartmentAccess(Department $department)
    {
        return $this->departments()->save($department);
    }

    public function normalizer($module)
    {
        foreach ($this->policyActions() as $action) {
            $this->modulePermissions[] = $action . " " .ucwords($module);
        }

        return $this->modulePermissions;
    }

    public function workflow()
    {
        return $this->hasOne(WorkFlow::class);
    }

    public function savePermission($permission, $module_name=null)
    {
        $permission = Permission::create([
            'name' => $permission,
            'key' => Str::slug($permission),
            'module' => $module_name
        ]);

        if (! $permission) {
            return null;
        }

        return $permission;
    }
}
