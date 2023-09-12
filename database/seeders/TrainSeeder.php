<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        foreach(range(1, 20) as $index) {

            $date = Carbon::now()->addDays(rand(0, 30));
            $time = $faker->time;

            Train::create([
                'azienda' => $faker->company,
                'stazione_partenza' => $faker->city,
                'stazione_arrivo' => $faker->city,
                'orario_partenza' => $date->toDateString() . ' ' . $time,
                'orario_arrivo' => $date->toDateString() . ' ' . $time,
                'codice_treno' => $faker->unique()->randomNumber(5),
                'numero_carrozze' => $faker->numberBetween(1, 10),
                'in_orario' => $faker->boolean,
                'cancellato' => $faker->boolean,
            ]);
        }
    }
}
