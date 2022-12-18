<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
  /**
   * 収支
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payment', function (Blueprint $table) {
      $table->uuid('payment_id')->primary();
      $table->char('payment_category_parent_id', 36)->nullable();
      $table->char('payment_category_child_id', 36)->nullable();
      $table->date('payment_date');
      $table->decimal('amount', 6);
      $table->char('user_id', 36);
      $table->boolean('is_pay');
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
    Schema::dropIfExists('payment');
  }
}
