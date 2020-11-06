<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Kategorija;


class JeloTablicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            $users=User::all();
            $min = Kategorija::first()->id;
            $max = Kategorija::orderBy('created_at', 'desc')->first()->id;
            $minu = User::first()->id;
            $maxu = User::orderBy('created_at', 'desc')->first()->id;

            for($j=0;$j<(count($users));$j++){
                $faker = Faker::create('App\Models\Jelo');
                DB::table('jelos')->insert([
                'naziv' => $faker->sentence(),
                'opis' => $faker->sentence(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => rand($minu, $maxu),
                'cover_image' => 'noimage.jpg',
                'kategorija_id' => rand($min, $max),
                ]);
            }
        }
    }
}
