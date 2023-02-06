<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentCategory extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('parent_category', function (Blueprint $table) {
      $table->uuid('parent_id')->primary();
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
    Schema::dropIfExists('parent_category');
  }
}
