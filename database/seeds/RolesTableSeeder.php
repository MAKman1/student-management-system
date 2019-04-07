<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'accountant';
        $role_employee->description = 'Finance management/ Reception handling';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'administration';
        $role_manager->description = 'Administration';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'teacher';
        $role_manager->description = 'teacher';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'student';
        $role_manager->description = 'student';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'parent';
        $role_manager->description = 'parent';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'admin';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'sysadmin';
        $role_manager->description = 'system admin';
        $role_manager->save();
    }
}
