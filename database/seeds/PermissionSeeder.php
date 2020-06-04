<?php

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
        Permission::create(['name' => 'show_pets']);
        Permission::create(['name' => 'edit_pets']);
        Permission::create(['name' => 'delete_pets']);
        Permission::create(['name' => 'create_pets']);
    }
}
