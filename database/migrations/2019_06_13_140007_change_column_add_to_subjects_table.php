<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnAddToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('sDoc')->after('status_id');
            $table->integer('sReal')->after('sDoc');
            $table->integer('sSub')->after('sDoc');
            $table->string('delPoint')->after('longitude');
            $table->integer('deleter')->after('delPoint');
            $table->integer('fucntionDoc')->after('type_id');
            //$table->date('dateRent')->after('document');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['sDoc','sReal', 'sSub', 'delPoint', 'deleter', 'functionDoc']);
        });
    }
}
