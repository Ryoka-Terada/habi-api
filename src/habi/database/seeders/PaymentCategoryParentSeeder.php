<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentCategoryParentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('payment_category_parent')->truncate();
    DB::table('payment_category_parent')->insert(['payment_category_parent_id' => '1', 'category_name' => '食費', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()], );
    DB::table('payment_category_parent')->insert(['payment_category_parent_id' => '2', 'category_name' => '趣味', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_parent')->insert(['payment_category_parent_id' => '3', 'category_name' => '日用品', 'is_pay' => 1, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_category_parent')->insert(['payment_category_parent_id' => '4', 'category_name' => '給料', 'is_pay' => 0, 'user_id' => '1','is_delete' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
