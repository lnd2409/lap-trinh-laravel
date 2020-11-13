<?php

use Illuminate\Database\Seeder;

class LoaiSanPhamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaiSanPham = [
            [
                'l_ten' => "Loại 1"
            ],
            [
                'l_ten' => "Loại 2"
            ],
            [
                'l_ten' => "Loại 3"
            ]
        ];

        DB::table('loaisanpham')->insert($loaiSanPham);
    }
}
