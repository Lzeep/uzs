<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table){
           $table->integer('district_id')->after('id');
           $table->integer('mtu_id')->after('district_id');
           $table->integer('type_id')->after('mtu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table){
            $table->dropColumn(['district_id', 'mtu_id', 'type_id']);
        });
    }
}
