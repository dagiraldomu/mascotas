<?php

use Illuminate\Database\Seeder;
use App\Objective;

class ObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Objective::create([
            'name' => 'mamífero',
        ]);

        Objective::create([
            'name' => 'reptiles',
        ]);

        Objective::create([
            'name' => 'anfibios',
        ]);

        Objective::create([
            'name' => 'peces',
        ]);

        Objective::create([
            'name' => 'aves',
        ]);
    }
}
