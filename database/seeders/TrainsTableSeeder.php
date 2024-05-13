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
    public function run(Faker $faker):void {

        $trains = config('db.trains');

        for($i = 0; $i < 10; $i++){
            $train = new Train();
            $train->company = $train['company'];
            $train->departure_station = $train['departure_station'];
            $train->arrival_station = $train['arrival_station'];
            $train->departure_time = $train['departure_time'];
            $train->arrival_time = $train['arrival_time'];
            $train->train_code = $train['train_code'];
            $train->coach_count = $train['coach_count'];
            $train->on_time = $train['on_time'];
            $train->cancelled = $train['cancelled'];
            $train->remaining_tickets = $train['remaining_ticket'];
            $train->ticket_price = $train['ticket_price'];
            $train->has_Stopover = $train['has_Stopover'];
            $train->has_disabilities_support = $train['has_disabilities_support'];
            $train->details = $train['details'];
            $train->departure_date = $train['departure_date'];
            $train->save();
        }
    }
}

