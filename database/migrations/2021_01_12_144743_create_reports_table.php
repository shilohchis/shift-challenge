<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->char('final', 4)->nullable();
            $table->unsignedTinyInteger('E')->default(false);
            $table->unsignedTinyInteger('I')->default(false);
            $table->unsignedTinyInteger('S')->default(false);
            $table->unsignedTinyInteger('N')->default(false);
            $table->unsignedTinyInteger('T')->default(false);
            $table->unsignedTinyInteger('F')->default(false);
            $table->unsignedTinyInteger('J')->default(false);
            $table->unsignedTinyInteger('P')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
