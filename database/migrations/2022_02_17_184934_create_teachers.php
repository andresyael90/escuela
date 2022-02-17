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
            $table->unsignedBigInteger('teachers_id')->nullable()->after('id');
            $table  ->foreign('teachers_id')
                    ->references('id')
                    ->on('teachers')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table){
            $table->dropForeign('lessons_teachers_id_foreign');
            $table->dropColumn('teachers_id');
        });

        Schema::dropIfExists('teachers');
    }
};
