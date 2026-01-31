<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name' => 'テストユーザー',
                'email' => 'test@example.com',
                'password' => Hash::make('coachtech'),
                'address' => '東京都目黒区下目黒2-20-28',
                'building' => 'いちご目黒ビル4階',
                'postal_code' =>'153-0064'
            ],
            [
                'name' => 'テストユーザー2',
                'email' => 'test2@example.com',
                'password' => Hash::make('coachtech'),
                'address' => '東京都渋谷区渋谷1-1-1',
                'building' => 'テストビル10F',
                'postal_code' => '150-0002',
            ],
        ]);
    }
}
