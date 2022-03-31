<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
        $committee_admin_role = Role::find(2);

        $view_all = Permission::create(['name' => 'Get All Users']);
        $create = Permission::create(['name' => 'Create User']);
        $edit = Permission::create(['name' => 'Edit User']);
        $delete = Permission::create(['name' => 'Delete User']);
        $show = Permission::create(['name' => 'Show User']);

        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $create, $edit, $delete, $show ]);
        // Users Module Permissions end

        // Roles Module Permissions Start
        $view_all = Permission::create(['name' => 'View All Roles']);
        $show = Permission::create(['name' => 'Show Role']);
        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $show ]);
        // Roles Module Permissions End


        // Committees Module Permissions Start
        $view_all = Permission::create(['name' => 'Get All Committees']);
        $create = Permission::create(['name' => 'Create Committee']);
        $edit = Permission::create(['name' => 'Edit Committee']);
        $delete = Permission::create(['name' => 'Delete Committee']);
        $show = Permission::create(['name' => 'Show Committee']);
        $individual_committee = Permission::create(['name' => 'Get Individual Committee']);
        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $create, $edit, $delete, $show ]);
        $sync_permissions = $committee_admin_role->givePermissionTo([ $individual_committee ]);
        // Committees Module Permissions End


        // Event Locations Module Permissions Start
        $view_all = Permission::create(['name' => 'Get All Event Locations']);
        $create = Permission::create(['name' => 'Create Event Location']);
        $edit = Permission::create(['name' => 'Edit Event Location']);
        $delete = Permission::create(['name' => 'Delete Event Location']);
        $show = Permission::create(['name' => 'Show Event Location']);
        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $create, $edit, $delete, $show ]);
        $sync_permissions = $committee_admin_role->givePermissionTo([ $view_all ]);
        // Event Locations Module Permissions End


        // Event Module Permissions Start
        $view_all = Permission::create(['name' => 'Get All Events']);
        $view_all_committee = Permission::create(['name' => 'Get All Committee Events']);
        $create = Permission::create(['name' => 'Create Event']);
        $edit = Permission::create(['name' => 'Edit Event']);
        $delete = Permission::create(['name' => 'Delete Event']);
        $show = Permission::create(['name' => 'Show Event']);
        $approve = Permission::create(['name' => 'Approve Event']);
        $sync_permissions = $admin_role->givePermissionTo([ $view_all, $create, $edit, $delete, $show,$approve ]);
        $sync_permissions = $committee_admin_role->givePermissionTo([ $view_all_committee, $create, $edit, $delete, $show ]);
        // Event Module Permissions End
    }
}
