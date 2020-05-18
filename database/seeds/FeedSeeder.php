<?php

use Illuminate\Database\Seeder;
use App\Feed;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Feed::create([
            'name' => 'hervívoro',
        ]);

        Feed::create([
            'name' => 'carnívoro',
        ]);


    }
}
