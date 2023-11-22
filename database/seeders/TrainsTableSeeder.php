<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i > 10; $i++){
            $train = new Train();
            $train->reference = $faker->words(3, true);
            $train->slug = $faker->words(3, true);
            $train->company = $faker->randomElement(["Trenitalia", "Italo", "Ferrovie dello Stato", "Ferrovie Nord", "Ferrovie Sud", "Ferrovie Centro"]);
            $train->type = $faker->randomElement(["Regionale", "Alta Velocità", "Regionale Veloce", "Notturno"]);
            $train->departure_station = $faker->city;
            $train->arrival_station = $faker->city;
            $train->departure_time = $faker->time;
            $train->arrival_time = $faker->time;
            $train->code = $faker->$faker->randomNumber(5, true);
            $train->carriages = $faker->bothify("??###");
            $train->in_time = $faker->randomElement("Y", "N");
            $train->is_cancelled = $faker->randomElement("Y", "N");

            $train->save();
        }
    }

    private function generateSlug($reference){
		$slug = Str::slug($reference, "-");
		$original_slug = $slug;
		$exists = Train::where("slug", $slug)->first();
		$c = 1;
		while($exists){
			$slug = $original_slug . "-" . $c;
			$exists = Train::where("slug", $slug)->first();

			$c++;
		}
		return $slug;
	}
}
