<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class NhanVienSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Khai báo thư viện faker
        $faker = Faker\Factory::create();
        for ($i=0; $i < 30; $i++) {
            # code...
            $nhanVien = [
                [
                    'nv_ten' => $faker->name,
                    'nv_email' => $faker->email,
                    'username' => 'ngocduc'.rand(1,999),
                    'password' => Hash::make(123),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];
            $addNhanVien = DB::table('nhanvien')->insert($nhanVien);
        }
    }
}
