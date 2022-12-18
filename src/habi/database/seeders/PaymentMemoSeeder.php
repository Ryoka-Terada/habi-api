<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMemoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('payment_memo')->truncate();
    DB::table('payment_memo')->insert(['payment_memo_id' => '1', 'memo' => '今日は楽しい買い物をしました。', 'is_display' => 0, 'payment_date' => new DateTime('2022-08-15 00:00:00'), 'user_id' => '1', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
    DB::table('payment_memo')->insert(['payment_memo_id' => '2', 'memo' => '家賃を払う', 'is_display' => 1, 'payment_date' => new DateTime('2022-08-21 00:00:00'), 'user_id' => '1', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]);
  }
}
