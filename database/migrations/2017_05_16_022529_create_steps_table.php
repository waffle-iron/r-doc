<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('steps', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('guide_id')->unsigned();
      $table->string('title')->nullable();
      $table->integer('orderby')->unsigned();
      $table->integer('revision_id')->unsigned();
      $table->integer('image_id')->unsigned();
      $table->timestamp('revised_at')->nullable()->default(null);
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
    Schema::dropIfExists('steps');
  }
}
