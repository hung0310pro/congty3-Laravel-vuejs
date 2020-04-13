<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 5)
           ->create()
           ->each(function ($u) {
                $u->comments()->save(factory(App\Comment::class)->create());
            }
        );

        // Creates authors with no articles
        factory(App\People::class, 2)->create();

        // Creates Articles without Comments
        factory(App\Product::class, 3)->create();
    }
}

/**
 * 
 */
/*php artisan db:seed*/

class sanphammigrate extends Seeder
{
	public function run(){
		DB::table('sanphammigrate')->insert([
			['nameproduct' => 'product1'],
			['nameproduct' => 'product2'],
			['nameproduct' => 'product3'],
		]);
	}
}

/*	DB::table('thanh_vien')->insert([
    	['user' => 'hung0310pro','password' => Hash::make('hung0310pro'),'level' => 1],
    	['user' => 'vantuan','password' => Hash::make('vantuan'),'level' => 2],
    	['user' => 'dinhdao','password' => Hash::make('dinhdao'),'level' => 3],
    ]);*/

class Car extends Seeder
{
    public function run(){
        DB::table('Car')->insert([
            ['name' => 'car1','price' => '300'],
            ['name' => 'car2','price' => '200'],
            ['name' => 'car3','price' => '100'],
        ]);
    }
}

class Color extends Seeder
{
    public function run(){
        DB::table('Color')->insert([
            ['name' => 'red'],
            ['name' => 'black'],
            ['name' => 'green'],
        ]);
    }
}

class CarColor extends Seeder
{
    public function run(){
        DB::table('CarColor')->insert([
            ['id_car' => '1','id_color' => '1'],
            ['id_car' => '2','id_color' => '2'],
            ['id_car' => '3','id_color' => '2'],
            ['id_car' => '1','id_color' => '2'],
            ['id_car' => '2','id_color' => '3'],
            ['id_car' => '3','id_color' => '1'],
            ['id_car' => '2','id_color' => '1'],
        ]);
    }
}

class TheLoai extends Seeder
{
    public function run(){
        DB::table('TheLoai')->insert([
            ['ten' => 'TheLoai1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'TheLoai2','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'TheLoai3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'TheLoai4','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}

class LoaiTin extends Seeder
{
    public function run(){
        DB::table('LoaiTin')->insert([
            ['ten' => 'LoaiTin1','id_theloai' => '1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'LoaiTin2','id_theloai' => '1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'LoaiTin3','id_theloai' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'LoaiTin4','id_theloai' => '3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['ten' => 'LoaiTin5','id_theloai' => '3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}         


class TinTuc extends Seeder
{
    public function run(){
        DB::table('TinTuc')->insert([
            ['tieude' => 'Tiêu đề 1','noidung' => 'Đây là nội dung test của tiêu đề 1','hinhanh' => '','id_loaitin' => '3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 2','noidung' => 'Đây là nội dung test của tiêu đề 2','hinhanh' => '','id_loaitin' => '1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 3','noidung' => 'Đây là nội dung test của tiêu đề 3','hinhanh' => '','id_loaitin' => '2','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 4','noidung' => 'Đây là nội dung test của tiêu đề 4','hinhanh' => '','id_loaitin' => '3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 5','noidung' => 'Đây là nội dung test của tiêu đề 5','hinhanh' => '','id_loaitin' => '3','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 6','noidung' => 'Đây là nội dung test của tiêu đề 6','hinhanh' => '','id_loaitin' => '1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 7','noidung' => 'Đây là nội dung test của tiêu đề 7','hinhanh' => '','id_loaitin' => '5','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

            ['tieude' => 'Tiêu đề 8','noidung' => 'Đây là nội dung test của tiêu đề 8','hinhanh' => '','id_loaitin' => '5','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}  
  