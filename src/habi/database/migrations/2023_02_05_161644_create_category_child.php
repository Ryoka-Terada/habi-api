<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryChild extends Migration
{
  /**
   * 子カテゴリ
   *
   * @return void
   */
  public function up()
  {
    Schema::create('category_child', function (Blueprint $table) {
      $table->uuid('child_id')->primary();
      $table->string('category_name', 100);
      $table->char('parent_id', 36);
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
    Schema::dropIfExists('category_child');
  }
}
