<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('types', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('guide_id')->unsigned()->nullable()->default(null);
      $table->string('name');
      $table->timestamp('deleted_at')->nullable()->default(null);
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
    Schema::dropIfExists('types');
  }
}
