<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => 'coachtech',
            'address' => '東京都目黒区下目黒2-20-28',
            'building' => 'いちご目黒ビル4階',
            'postal_code' =>'153-0064'
        ]);
    }
}
