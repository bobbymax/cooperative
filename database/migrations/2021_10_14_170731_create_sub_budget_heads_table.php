<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBudgetHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_budget_heads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('budget_head_id')->unsigned();
            $table->foreign('budget_head_id')->references('id')->on('budget_heads')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('code')->unique();
            $table->text('name');
            $table->longText('description')->nullable();
            $table->enum('type', ['capital', 'overhead', 'personnel'])->default('capital');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('sub_budget_heads');
    }
}
