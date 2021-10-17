<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->enum('category', ['multiple-choice', 'objectives', 'text', 'range-choice'])->default('range-choice');
            $table->integer('max_range_number')->default(0);
            $table->integer('score')->default(0);
            $table->enum('type', ['general', 'technical', 'financial', 'survey', 'feedback'])->default('general');

            $table->bigInteger('surveyable_id')->unsigned();
            $table->string('surveyable_type');
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
        Schema::dropIfExists('surveys');
    }
}
