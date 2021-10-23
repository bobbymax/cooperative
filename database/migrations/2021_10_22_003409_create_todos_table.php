<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id')->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->longText('description')->nullable();

            $table->integer('duration')->default(0);
            $table->date('start_date')->nullable();
            $table->date('expiry')->nullable();
            $table->date('date_completed')->nullable();

            $table->enum('measure', ['minutes', 'hours', 'days', 'weeks', 'months', 'years'])->default('days');
            $table->enum('status', ['pending', 'in-progress', 'fulfilled', 'overdue'])->default('pending');
            $table->boolean('closed')->default(false);
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
        Schema::dropIfExists('todos');
    }
}
