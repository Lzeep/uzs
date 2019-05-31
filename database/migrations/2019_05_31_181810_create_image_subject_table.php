<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('image_id');
            $table->integer('subject_id');
            $table->timestamps();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_subject');
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('image_id')->nullable();
        });
    }

}
