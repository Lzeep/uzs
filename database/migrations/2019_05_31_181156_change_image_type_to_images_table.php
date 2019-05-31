<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeImageTypeToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('image')->change();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('image_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->mediumText('image')->change();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('image_id')->nullable(false)->change();
        });
    }
}
