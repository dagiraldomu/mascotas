<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feed_pet')->insert([
            'feed_id' => '1',
            'pet_id' => '1',
        ]);
        DB::table('feed_pet')->insert([
            'feed_id' => '2',
            'pet_id' => '1',
        ]);
    }
}
