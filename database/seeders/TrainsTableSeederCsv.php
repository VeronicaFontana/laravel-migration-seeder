<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainsTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = fopen(__DIR__ . "/trains.csv", "r");
        $i = 0;
        while(($row = fgetcsv($data))!== FALSE){
            if($i > 0){
                $train = new Train();
                $train->company = $row[0];
                $train->departure_station = $row[1];
                $train->arrival_station = $row[2];
                $train->departure_time = $row[3];
                $train->arrival_time = $row[4];
                $train->code = $row[5];
                $train->carriages = $row[6];
                $train->in_time = $row[7];
                $train->is_cancelled = $row[8];

                $train->save();
            }

            $i++;
        }
        fclose($data);
    }
}
