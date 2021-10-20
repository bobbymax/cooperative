<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_code_id')->unsigned();
            $table->foreign('account_code_id')->references('id')->on('account_codes')->onDelete('cascade');
            $table->bigInteger('batch_id')->unsigned();
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('code')->unique()->nullable();
            

            $table->decimal('amount', $precision = 30, $scale = 2)->default(0);
            $table->longText('description')->nullable();
            $table->enum('currency', ['NGN', 'USD', 'GBP', 'EUR', 'YEN'])->default('NGN');
            $table->integer('month')->default(0);
            $table->integer('year')->default(0);
            $table->enum('type', ['third-party', 'staff-payment'])->default('third-party');
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
        Schema::dropIfExists('journals');
    }
}
