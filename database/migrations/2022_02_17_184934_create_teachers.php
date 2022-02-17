<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('office');
            $table->string('telephone');
            $table->string('email');
        });
        Schema::table('lessons', function (Blueprint $table){
            $table->unsignedBigInteger('lesson_id')->nullable()->after('id');
            $table  ->foreign('lesson_id')
                    ->references('id')
                    ->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
