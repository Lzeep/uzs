<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCoordinatesTypeToTobjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tobjects', function (Blueprint $table) {
            $table->string('latitude')->change();
            $table->string('longitude')->change();
            $table->renameColumn('violationId', 'violation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tobjects', function (Blueprint $table) {
            $table->decimal('latitude')->change();
            $table->decimal('longitude')->change();
            $table->renameColumn('violation_id', 'violationId');
        });
    }
}
