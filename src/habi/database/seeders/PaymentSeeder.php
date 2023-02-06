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
    DB::table('payment')->insert(['payment_id' => '1', 'parent_id' => '1', 'child_id' => '1', 'payment_date' => new DateTime('2022-08-15 00:00:00'), 'amount' => 3000, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '2', 'parent_id' => '1', 'child_id' => '2', 'payment_date' => new DateTime('2022-08-15 00:00:00'), 'amount' => 1500, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '3', 'parent_id' => '1', 'child_id' => '', 'payment_date' => new DateTime('2023-01-16 00:00:00'), 'amount' => 300, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '4', 'parent_id' => '2', 'child_id' => '4', 'payment_date' => new DateTime('2023-02-21 00:00:00'), 'amount' => 4200, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '5', 'parent_id' => '1', 'child_id' => '', 'payment_date' => new DateTime('2023-02-25 00:00:00'), 'amount' => 1000, 'user_id' => '1', 'is_pay' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '6', 'parent_id' => '4', 'child_id' => '', 'payment_date' => new DateTime('2023-02-25 00:00:00'), 'amount' => 1000, 'user_id' => '1', 'is_pay' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment')->insert(['payment_id' => '7', 'parent_id' => '4', 'child_id' => '5', 'payment_date' => new DateTime('2023-02-25 00:00:00'), 'amount' => 4500, 'user_id' => '1', 'is_pay' => 0, 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
