<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('body');
			$table->integer('views')->unsigned()->default(0);
			$table->integer('answers')->unsigned()->default(0);
			$table->integer('votes')->default(0);
			$table->integer('best_answer')->nullable();
			$table->integer('user_id');
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}