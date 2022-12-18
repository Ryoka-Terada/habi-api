<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('payment')->truncate();
    DB::table('payment')->insert(['payment_id' => '1', 'payment_category_parent_id' => '1', 'payment_category_child_id' => '1', 'payment_date' => new DateTime('2022-08-15 00:00:00'), 'amount' => 3000, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '2', 'payment_category_parent_id' => '1', 'payment_category_child_id' => '2', 'payment_date' => new DateTime('2022-08-15 00:00:00'), 'amount' => 1500, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '3', 'payment_category_parent_id' => '1', 'payment_category_child_id' => '', 'payment_date' => new DateTime('2022-08-16 00:00:00'), 'amount' => 300, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '4', 'payment_category_parent_id' => '2', 'payment_category_child_id' => '4', 'payment_date' => new DateTime('2022-08-21 00:00:00'), 'amount' => 4200, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '5', 'payment_category_parent_id' => '', 'payment_category_child_id' => '', 'payment_date' => new DateTime('2022-08-23 00:00:00'), 'amount' => 1000, 'user_id' => '1', 'is_pay' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '6', 'payment_category_parent_id' => '4', 'payment_category_child_id' => '5', 'payment_date' => new DateTime('2022-08-30 00:00:00'), 'amount' => 4500, 'user_id' => '1', 'is_pay' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
