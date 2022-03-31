<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users Module Permission start
        $admin_role = Role::find(1);

        $view_all = Permission::create(['name' => 'View All Users']);
        $create = Permission::create(['name' => 'Create User']);
        $edit = Permission::create(['name' => 'Edit User']);
        $delete = Permission::create(['name' => 'Delete User']);
        $show = Permission::create(['name' => 'Show User']);

        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $create, $edit, $delete, $show ]);
        // Users Module Permissions end
    }
}
