<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use Illuminate\Support\Str;

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
