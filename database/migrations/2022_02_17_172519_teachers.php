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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('office');
            $table->string('telephone');
            $table->string('email');
        });
        Schema::table('lessons',function(Blueprint $table){
            $table->unsignedBigInteger('lessons_id')->nullable()->after('id');
            $table  ->foreign('lessons_id')
                    ->references('id')
                    ->on('lessons')
                    ;
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table){
            $table->dropColumn('lessons_id');
        });
        Schema::dropIfExists('teachers');
    }
};
