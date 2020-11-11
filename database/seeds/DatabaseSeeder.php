<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $quyen = [
            [
                'q_ten' => 'Quản trị'
            ],
            [
                'q_ten' => 'Nhân viên thường'
            ]
        ];
        $addQuyen = DB::table('quyen')->insert($quyen);
    }
}
