<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Object_id');
            $table->string('Name_of_object');
            $table->string('Owner_name');
            $table->integer('Status_of_the_land');
            $table->integer('Status_of_object');
            $table->integer('Voalation_id');
            $table->string('Result_of_measures');
            $table->string('Note');
            $table->integer('Employee_id');
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
        Schema::dropIfExists('t_objects');
    }
}
