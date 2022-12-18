<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCategoryParentTable extends Migration
{
  /**
   * 親カテゴリ
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payment_category_parent', function (Blueprint $table) {
      $table->uuid('payment_category_parent_id')->primary();
      $table->string('category_name', 100);
      $table->boolean('is_pay');
      $table->char('user_id', 36);
      $table->boolean('is_delete');
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
    Schema::dropIfExists('payment_category_parent');
  }
}
