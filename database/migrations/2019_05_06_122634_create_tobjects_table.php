<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTobjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tobjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('object_id');
            $table->string('nameOfObject');
            $table->string('ownerName');
            $table->integer('statusOfLand');
            $table->integer('statusOfObject');
            $table->integer('violationId');
            $table->string('resultOfmeasure');
            $table->string('documents');
            $table->integer('employeeId');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->date('Date_edit');
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
        Schema::dropIfExists('tobjects');
    }
}
