<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('revisions', function (Blueprint $table) {
      $table->increments('id');
      $table->string('description');
      $table->integer('guide_id')->unsigned();
      $table->integer('editor_id')->unsigned();
      $table->integer('owner_id')->unsigned();
      $table->integer('status_id')->unsigned();
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
    Schema::dropIfExists('revisions');
  }
}
