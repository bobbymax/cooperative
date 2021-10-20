<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_codes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_chart_id')->unsigned();
            $table->foreign('account_chart_id')->references('id')->on('account_charts')->onDelete('cascade');

            $table->string('name');
            $table->string('label')->unique();

            $table->bigInteger('code')->default(0);
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
        Schema::dropIfExists('account_codes');
    }
}
