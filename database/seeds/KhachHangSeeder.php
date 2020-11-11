<?php

use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i <= 10 ; $i++)
        {
            DB::table('khachhang')->insert(
                [
                    'username' => 'ngocduc'.$i,
                    'password' => Hash::make(123),
                    'kh_hoten' => 'Ngọc Đức'.$i,
                    'kh_sdt' => '087890090'.rand(1,9),
                    'kh_diachi' => 'Cần Thơ'
                ]
            );
        }
    }
}
