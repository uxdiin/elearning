<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->string('pertanyaan');
            $table->string('jawaban');
            $table->unsignedInteger('problem_id');
            $table->foreign('problem_id')->references('id')->on('problems');
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
        Schema::dropIfExists('problem_numbers');
    }
}
