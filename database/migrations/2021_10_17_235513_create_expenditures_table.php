<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('sub_budget_head_id')->unsigned();
            $table->foreign('sub_budget_head_id')->references('id')->on('sub_budget_heads')->onDelete('cascade');

            $table->string('reference_no')->unique();
            $table->bigInteger('batch_id')->default(0);

            $table->integer('percentage_pay')->default(0);
            $table->decimal('amount', $precision = 30, $scale = 2)->default(0);
            $table->string('beneficiary')->nullable();
            $table->longText('description')->nullable();
            $table->text('additional_info')->nullable();


            $table->bigInteger('expenditureable_id')->unsigned();
            $table->string('expenditureable_type');
            $table->enum('currency', ['NGN', 'USD', 'EUR', 'YEN', 'GBP', 'CAD'])->default('NGN');
            $table->enum('type', ['third-party', 'staff'])->default('third-party');
            $table->enum('payment_type', ['staff-claim', 'touring-advance', 'other'])->default('other');
            $table->enum('status', ['pending', 'registered', 'batched', 'processing', 'queried', 'paid'])->default('pending');
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
        Schema::dropIfExists('expenditures');
    }
}
