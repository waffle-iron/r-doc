<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('username')->nullable()->default(null);
      $table->string('email')->unique();
      $table->string('password');
      $table->integer('image_id')->unsigned()->nullable()->default(null);
      $table->integer('team_id')->unsigned()->nullable()->default(null);
      $table->string('url')->nullable()->default(null);
      $table->rememberToken();
      $table->timestamp('last_read_announcement_at')->nullable()->default(null);
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
    Schema::dropIfExists('users');
  }
}
