<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTechnologyForeginKeyInListTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_tasks', function (Blueprint $table) {
            $table->unsignedInteger('technology_id')->nullable();
            $table->foreign('technology_id')->references('id')->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_tasks', function (Blueprint $table) {
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');

        });
    }
}
