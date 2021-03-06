<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'Super Admin']);
        $committee_admin = Role::create(['name' => 'Committee Admin']);
        $student = Role::create(['name' => 'Student']);
    }
}
