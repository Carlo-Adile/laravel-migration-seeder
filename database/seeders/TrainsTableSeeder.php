<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        /* $trains = config('db.trains'); */

        for ($i = 0; $i < 10; $i++) {
            $train = new Train();
            $train->company = $faker->word();
            $train->departure_station = $faker->words(2, true);
            $train->arrival_station = $faker->words(2, true);
            $train->departure_time = $faker->time();
            $train->arrival_time = $faker->time();
            $train->train_code = $faker->bothify('????#');
            $train->coach_count = $faker->numberBetween(5, 10);
            $train->on_time = $faker->boolean();
            $train->cancelled = $faker->boolean();
            $train->remaining_tickets = $faker->numberBetween(0, 200);
            $train->ticket_price = $faker->randomFloat(2, 0, 99.99);
            $train->has_Stopover = $faker->boolean();
            $train->has_disabilities_support = $faker->boolean();
            $train->details = $faker->sentence(12);
            /* dateTimeBetween produce dateTimeValue, tuttavia il mio campo accetta solo date, quindi salvo la variabile e poi la formatto quando la passo al db */
            $departureDateTime = $faker->dateTimeBetween('now', '+4 week');
            $departureDate = $departureDateTime->format('Y-m-d');
            $train->departure_date = $departureDate;
            $train->save();
        }
    }
}

