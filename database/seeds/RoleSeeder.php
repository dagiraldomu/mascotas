<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo('show_pets');
        $role->givePermissionTo('edit_pets');
        $role->givePermissionTo('delete_pets');
        $role->givePermissionTo('create_pets');

        $user = new User();
        $user->name = 'Daniel';
        $user->email = 'd.anigiraldomu@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
        $user->assignRole($role);
    }
}
