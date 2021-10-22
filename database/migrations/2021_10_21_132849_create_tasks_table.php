<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->string('title');
            $table->string('label')->unique();
            $table->string('reference_no')->unique();
            $table->integer('duration')->default(0);
        
            $table->date('start_date')->nullable();
            $table->date('expiry')->nullable();
            $table->date('date_completed')->nullable();

            $table->longText('description')->nullable();

            $table->enum('measure', ['minutes', 'hours', 'days', 'weeks', 'months', 'years'])->default('days');
            $table->enum('status', ['pending', 'in-progress', 'in-review', 'fulfilled', 'overdue'])->default('pending');
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
        Schema::dropIfExists('tasks');
    }
}
