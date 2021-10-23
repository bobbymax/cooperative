<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('journal_id')->unsigned();
            $table->foreign('journal_id')->references('id')->on('journals')->onDelete('cascade');

            $table->string('pv_no')->unique()->nullable();

            $table->enum('mode_of_payment', ['cheque', 'by-cash', 'bank-transfer'])->default('bank-transfer');
            $table->enum('type', ['c', 'd', 'a'])->default('c');

            $table->enum('status', ['generated', 'in-process', 'posted', 'paid'])->default('generated');
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
        Schema::dropIfExists('ledgers');
    }
}
