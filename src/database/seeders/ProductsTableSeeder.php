<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' =>1,
            'name' => '腕時計',
            'price' => '15000',
            'brand' => 'Rolax',
            'description' =>'スタイリッシュなデザインのメンズ腕時計',
            'image_path' => 'products/Clock.jpg',
            'condition' =>1
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'HDD',
            'price' => '5000',
            'brand' => '西芝',
            'description' =>'高速で信頼性の高いハードディスク',
            'image_path' => 'products/Disk.jpg',
            'condition' =>2
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => '玉ねぎ3束',
            'price' => '300',
            'description' =>'新鮮な玉ねぎ3束のセット',
            'image_path' => 'products/onion.jpg',
            'condition' =>3
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => '革靴',
            'price' => '4000',
            'description' =>'クラシックなデザインの革靴',
            'image_path' => 'products/Shoes.jpg',
            'condition' =>4
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'ノートPC',
            'price' => '45000',
            'description' =>'高性能なノートパソコン',
            'image_path' => 'products/Laptop.jpg',
            'condition' =>1
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'マイク',
            'price' => '8000',
            'description' =>'高音質のレコーディング用マイク',
            'image_path' => 'products/Mic.jpg',
            'condition' =>2
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'ショルダーバッグ',
            'price' => '3500',
            'description' =>'おしゃれなショルダーバッグ',
            'image_path' => 'products/bag.jpg',
            'condition' =>3
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'タンブラー',
            'price' => '500',
            'description' =>'使いやすいタンブラー',
            'image_path' => 'products/Tumbler.jpg',
            'condition' =>4
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'コーヒーミル',
            'price' => '4000',
            'brand' => 'Starbacks',
            'description' =>'手動のコーヒーミル',
            'image_path' => 'products/Coffee.jpg',
            'condition' =>1
        ];
        DB::table('products')->insert($param);
        $param = [
            'user_id' =>1,
            'name' => 'メイクセット',
            'price' => '2500',
            'description' =>'便利なメイクアップセット',
            'image_path' => 'products/makeup.jpg',
            'condition' =>2
        ];
        DB::table('products')->insert($param);
    }
}
