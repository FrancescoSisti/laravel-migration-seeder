<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $companies = ['Trenitalia', 'Italo', 'Deutsche Bahn', 'SNCF', 'Renfe'];
        $cities = ['Milano', 'Roma', 'Napoli', 'Firenze', 'Venezia', 'Torino', 'Bologna', 'Bari'];

        for($i = 0; $i < 200; $i++) {
            $departureDate = $faker->dateTimeBetween('now', '+1 week');
            $departureTime = $faker->dateTimeBetween('00:00:00', '23:59:59');
            $hoursToAdd = $faker->numberBetween(1, 12);

            $arrival = clone $departureDate;
            $arrival->modify("+{$hoursToAdd} hours");

            Train::create([
                "company" => $faker->randomElement($companies),
                "departure_station" => $faker->randomElement($cities),
                "arrival_station" => $faker->randomElement($cities),
                "departure_date" => $departureDate->format('Y-m-d'),
                "departure_time" => $departureTime->format('H:i:s'),
                "arrival_date" => $arrival->format('Y-m-d'),
                "arrival_time" => $arrival->format('H:i:s'),
                "train_code" => $faker->unique()->numerify('##########'),
                "wagons_no" => $faker->numberBetween(4, 15),
                "on_time" => $faker->boolean(80),
                "suspended" => $faker->boolean(10),
            ]);
        }
    }
}
