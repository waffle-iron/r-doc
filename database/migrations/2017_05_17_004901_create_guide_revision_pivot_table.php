<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideRevisionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_revision', function (Blueprint $table) {
            $table->integer('guide_id')->unsigned()->index();
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
            $table->integer('revision_id')->unsigned()->index();
            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');
            $table->primary(['guide_id', 'revision_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guide_revision');
    }
}
