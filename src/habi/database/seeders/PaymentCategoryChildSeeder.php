<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentCategoryChildSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('payment_category_child')->truncate();
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '1', 'category_name' => '食材', 'payment_category_parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '2', 'category_name' => '外食', 'payment_category_parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '3', 'category_name' => 'おやつ', 'payment_category_parent_id' => '1', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '4', 'category_name' => '書籍', 'payment_category_parent_id' => '2', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '5', 'category_name' => 'バイト代', 'payment_category_parent_id' => '4', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_child')->insert(['payment_category_child_id' => '6', 'category_name' => 'ボーナス', 'payment_category_parent_id' => '4', 'is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
