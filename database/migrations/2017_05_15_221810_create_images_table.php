<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('images', function (Blueprint $table) {
      $table->increments('id')->unsigned();
      $table->integer('user_id')->unsigned()->nullable()->default(null);
      $table->integer('team_id')->unsigned()->nullable()->default(null);
      $table->integer('guide_id')->unsigned()->nullable()->default(null);
      $table->string('original');
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
    Schema::dropIfExists('images');
  }
}
