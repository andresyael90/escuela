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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('nota final');
            $table->string('observaciones');
        });
        Schema::table('courses', function (Blueprint $table){
            $table->unsignedBigInteger('evaluations_id')->nullable()->after('teachers_id');
            $table  ->foreign('evaluations_id')
                    ->references('id')
                    ->on('evaluations')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
        });
        Schema::table('students', function (Blueprint $table){
            $table->unsignedBigInteger('students_id')->nullable()->after('evaluations_id');
            $table  ->foreign('students_id')
                    ->references('id')
                    ->on('students')
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
        Schema::table('courses', function (Blueprint $table){
            $table->dropForeign('courses_evaluations_id_foreign');
            $table->dropColumn('evaluations_id');
        });
        Schema::table('courses', function (Blueprint $table){
            $table->dropForeign('courses_students_id_foreign');
            $table->dropColumn('students_id');
        });
        Schema::dropIfExists('evaluations');
    }
};
