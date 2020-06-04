<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ObjectiveSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(FeedSeeder::class);
        $this->call(PetSeeder::class);
        $this->call(GroupPetSeeder::class);
        $this->call(FeedPetSeeder::class);

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

    }
}
