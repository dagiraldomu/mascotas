<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_pet')->insert([
            'group_id' => '1',
            'pet_id' => '1',
        ]);
        DB::table('group_pet')->insert([
            'group_id' => '2',
            'pet_id' => '1',
        ]);
    }
}
