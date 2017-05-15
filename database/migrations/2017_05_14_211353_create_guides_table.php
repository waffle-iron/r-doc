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
      $table->string('dataType');
      $table->boolean('can_edit')->default(true);
      $table->string('url')->nullable()->default(null);
      $table->integer('category_id')->nullable(); //TODO: implement
      $table->string('revision')->default('-');
      $table->integer('type_id')->nullable(); //TODO: implement
      $table->integer('device_id')->nullable(); //TODO: implement
      $table->string('title');
      $table->text('summary');
      $table->text('introduction');
      $table->integer('image_id')->nullable(); //TODO: implement
      $table->string('previous_text');
      $table->text('conclusion');
      $table->boolean('obsolete')->default(false);
      $table->timestamp('revised_at')->nullable()->default(null);
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
