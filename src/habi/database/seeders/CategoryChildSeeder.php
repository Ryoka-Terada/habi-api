<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryChildSeeder extends Seeder
{
  /**
   * 子カテゴリのデータ
   *
   * @return void
   */
  public function run()
  {
    DB::table('child_category')->truncate();
    DB::table('child_category')->insert(['child_id' => '1', 'category_name' => '食材', 'parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('child_category')->insert(['child_id' => '2', 'category_name' => '外食', 'parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('child_category')->insert(['child_id' => '3', 'category_name' => 'おやつ', 'parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('child_category')->insert(['child_id' => '4', 'category_name' => '書籍', 'parent_id' => '2', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('child_category')->insert(['child_id' => '5', 'category_name' => 'バイト代', 'parent_id' => '4', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('child_category')->insert(['child_id' => '6', 'category_name' => 'ボーナス', 'parent_id' => '4', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
