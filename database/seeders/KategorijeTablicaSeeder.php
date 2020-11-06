<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class KategorijeTablicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            $faker = Faker::create('App\Models\Kategorija');
            DB::table('kategorijas')->insert([
            'naziv' => $faker->word(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ]);
        }
    }
}
