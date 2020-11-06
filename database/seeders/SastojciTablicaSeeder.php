<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;


class SastojciTablicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++){
            $faker = Faker::create('App\Models\Sastojak');
            DB::table('sastojaks')->insert([
            'naziv' => $faker->word(3),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ]);
        }
    }
}
