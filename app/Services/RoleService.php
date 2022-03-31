<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Auth;

class RoleService {

    public function getAllRoles() {
        if(Auth::user()->hasPermissionTo('View All Roles')) {
            $roles = Role::all();
            return $roles;
        }
    }

    public function showRole($id) {
        if(Auth::user()->hasPermissionTo('Show Role')) {
            $role = Role::find($id);
            return $role;
        }
    }


}
