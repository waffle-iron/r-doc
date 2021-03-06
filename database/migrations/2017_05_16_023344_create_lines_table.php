<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lines', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('step_id')->unsigned()->nullable();
      $table->text('text')->nullable();
      $table->string('bullet')->default('black');
      $table->integer('level')->unsigned();
      $table->integer('orderby')->unsigned();
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
    Schema::dropIfExists('lines');
  }
}
