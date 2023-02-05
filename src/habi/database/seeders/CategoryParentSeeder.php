<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryParentSeeder extends Seeder
{
  /**
   * 親カテゴリのデータ
   *
   * @return void
   */
  public function run()
  {
    DB::table('category_parent')->truncate();
    DB::table('category_parent')->insert(['parent_id' => '1', 'category_name' => '食費', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()], );
    DB::table('category_parent')->insert(['parent_id' => '2', 'category_name' => '趣味', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('category_parent')->insert(['parent_id' => '3', 'category_name' => '日用品', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('category_parent')->insert(['parent_id' => '4', 'category_name' => '給料', 'is_pay' => 0, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
