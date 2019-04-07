<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_accountant = Role::where('name', 'accountant')->first();
        $role_administration  = Role::where('name', 'administration')->first();
        $role_student = Role::where('name', 'student')->first();
        $role_parent  = Role::where('name', 'parent')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_sysadmin  = Role::where('name', 'sysadmin')->first();
        $role_teacher  = Role::where('name', 'teacher')->first();


        $accountant = new User();
        $accountant->name = 'Accountant Khan';
        $accountant->email = 'muhammadarhamkhan1@gmail.com';
        $accountant->password = bcrypt('makman');
        $accountant->username = 'accountant';
        $accountant->remember_token = str_random(10);
        $accountant->roles()->associate($role_accountant);
        $accountant->save();

        $administration = new User();
        $administration->name = 'Administration Khan';
        $administration->email = 'muhammadarhamkhan2@gmail.com';
        $administration->password = bcrypt('makman');
        $administration->username = 'administration';
        $administration->remember_token = str_random(10);
        $administration->roles()->associate($role_administration);
        $administration->save();

        $student = new User();
        $student->name = 'Student Khan';
        $student->email = 'muhammadarhamkhan3@gmail.com';
        $student->username = 'student';
        $student->password = bcrypt('makman');
        $student->remember_token = str_random(10);
        $student->roles()->associate($role_student);
        $student->save();

        $parent = new User();
        $parent->name = 'Parent Khan';
        $parent->email = 'muhammadarhamkhan4@gmail.com';
        $parent->password = bcrypt('makman');
        $parent->username = 'parent';
        $parent->remember_token = str_random(10);
        $parent->roles()->associate($role_parent);
        $parent->save();

        $admin = new User();
        $admin->name = 'Admin Khan';
        $admin->email = 'muhammadarhamkhan@gmail.com';
        $admin->password = bcrypt('makman');
        $admin->username = 'admin';
        $admin->remember_token = str_random(10);
        $admin->roles()->associate($role_admin);
        $admin->save();

        $admin = new User();
        $admin->name = 'Admin2 Khan';
        $admin->email = 'muhammadarhamkhan@gmail.com';
        $admin->password = bcrypt('makman');
        $admin->username = 'admin2';
        $admin->remember_token = str_random(10);
        $admin->roles()->associate($role_admin);
        $admin->save();

        $sysadmin = new User();
        $sysadmin->name = 'Sysadmin Khan';
        $sysadmin->email = 'muhammadarhamkhan6@gmail.com';
        $sysadmin->password = bcrypt('makman');
        $sysadmin->username = 'sysadmin';
        $sysadmin->remember_token = str_random(10);
        $sysadmin->roles()->associate($role_sysadmin);
        $sysadmin->save();

        $teacher = new User();
        $teacher->name = 'Teacher Khan';
        $teacher->email = 'muhammadarhamkha7@gmail.com';
        $teacher->password = bcrypt('makman');
        $teacher->username = 'teacher';
        $teacher->remember_token = str_random(10);
        $teacher->roles()->associate($role_teacher);
        $teacher->save();

    }
}
