<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('guides', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('datatype_id')->unsigned();
      $table->boolean('can_edit')->default(true);
      $table->string('url');
      $table->integer('category_id')->unsigned()->nullable();
      $table->string('revision')->default('-');
      $table->integer('revision_id')->unsigned();
      $table->integer('type_id')->unsigned()->nullable();
      $table->integer('device_id')->unsigned()->nullable();
      $table->string('title')->nullable();
      $table->text('summary')->nullable();
      $table->text('introduction')->nullable();
//      $table->integer('image_id')->nullable(); //TODO: implement
      $table->string('previous_text')->nullable();
      $table->text('conclusion')->nullable();
      $table->boolean('obsolete')->default(false);
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
    Schema::dropIfExists('guides');
  }
}
