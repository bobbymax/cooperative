<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('concern_id')->unsigned();
            $table->foreign('concern_id')->references('id')->on('concerns')->onDelete('cascade');

            $table->string('title');
            $table->string('reference_no')->uniique();
            $table->text('description')->nullable();
            $table->text('specification')->nullable();

            $table->enum('status', ['open', 'assigned', 'resolved', 'escalated', 'pending'])->default('open');
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
        Schema::dropIfExists('tickets');
    }
}
