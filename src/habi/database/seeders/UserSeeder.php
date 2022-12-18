<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('user')->truncate();
    DB::table('user')->insert(
      ['user_id' => '1', 'name' => 'インスタントユーザー', 'email' => 'aaa@gmail.com', 'is_delete' => 0,]
    );
  }
}
