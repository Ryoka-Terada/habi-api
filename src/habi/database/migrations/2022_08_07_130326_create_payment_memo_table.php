<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMemoTable extends Migration
{
  /**
   * 収支メモ
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payment_memo', function (Blueprint $table) {
      $table->uuid('payment_memo_id')->primary();
      $table->string('memo', 200);
      $table->boolean('is_display');
      $table->date('payment_date');
      $table->char('user_id', 36);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('payment_memo');
  }
}
