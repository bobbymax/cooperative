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
 * @OA\Property(property="name", type="string", example="Procurement Management Module"),
 * @OA\Property(property="label", type="string", example="Procurement Management"),
 * @OA\Property(property="code", type="string", example="PMM"),
 * @OA\Property(property="path", type="string", example="moduule path"),
 * @OA\Property(property="icon", type="string", example= "Icon path") ,
 * @OA\Property(property="parentId", type="integer", example="05"),
 * @OA\Property(property="quickAccess", type="boolean", example="False"),
 * @OA\Property(property="type", type="string", enum={"application","module","page"} , example="Approved"),
 * @OA\Property(property="generatePermissions", type="boolean", example="False"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 * @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * @OA\Property(property="deleted_at", type="date", example="2020-12-22")
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
