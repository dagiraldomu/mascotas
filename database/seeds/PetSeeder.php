<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Pet;


class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::create([
            'name' => 'Perros',
            'type_id' => '1',
            'objective_id' => 1,
            'description' => 'El perro, llamado perro doméstico o can, ​ y coloquialmente chucho​ o tuso, ​ y también choco, ​ es un mamífero carnívoro de la familia de los cánidos, que constituye una subespecie del lobo.',
            'date' => now(),
        ]);

        Pet::create([
            'name' => 'Gatos',
            'type_id' => '1',
            'objective_id' => 1,
            'description' => 'El gato doméstico​​, llamado popularmente gato, y de forma coloquial minino, ​ michino, ​ michi, ​ micho, ​ mizo, ​ miz, ​ morroño​ o morrongo, ​ entre otros nombres, es un mamífero carnívoro de la familia Felidae.',
            'date' => now(),
        ]);

        Pet::create([
            'name' => 'Hamsters',
            'type_id' => '1',
            'objective_id' => 1,
            'description' => 'Los cricetinos son una subfamilia de roedores, conocidos comúnmente como hámsteres. Se han identificado diecinueve especies actuales, agrupadas en siete géneros.',
            'date' => now(),
        ]);

        Pet::create([
            'name' => 'Peces',
            'type_id' => '1',
            'objective_id' => 4,
            'description' => 'Los peces (del latín pisces) son animales vertebrados primariamente acuáticos, generalmente ectotérmicos (regulan su temperatura a partir del medio.',
            'date' => now(),
        ]);

    }
}
