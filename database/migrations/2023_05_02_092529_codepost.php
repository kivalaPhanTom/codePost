<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Codepost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepost', function (Blueprint $table) {
            $table->increments("id");
            $table->string('title');
            $table->string('code');
            $table->integer('programLangId')->unsigned();
            $table-> foreign("programLangId")->references("id")->on("programing_language")->onDelete("cascade");
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
