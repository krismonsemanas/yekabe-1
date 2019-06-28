<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\User;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            $provinces = DB::table('location_province')->join('location_city','location_province.province_id','location_city.city_province_id')
                ->join('location_district','location_district.district_city_id','location_city.city_id')
                ->join('location_village','location_village.village_district_id','location_district.district_id')
                ->inRandomOrder()
                ->limit('50')
                ->get();
            for($i = 0 ; $i < 50 ; $i++)
            {
                $faker = Faker::create();
                $username = $faker->userName;
                $user = User::create([
                    "username" => $username,
                    "password" => bcrypt($username),
                    "level" => 'MURID',
                    "status" => 'ACTIVE'
                ]);
                $location = [
                    "province_id" => $provinces[$i]->province_id,
                    "city_id" => $provinces[$i]->city_id,
                    "district_id" => $provinces[$i]->district_id,
                    "village_id" => $provinces[$i]->village_id
                ];

                $user->siswa()->save(factory(App\Siswa::class)->make($location));
                
            }
        });
    }
}
