<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_budget_head_id')->unsigned();
            $table->foreign('sub_budget_head_id')->references('id')->on('sub_budget_heads')->onDelete('cascade');
            $table->bigInteger('service_category_id')->unsigned();
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->bigInteger('bid_id')->default(0);

            $table->string('title');
            $table->string('label')->unique();
            $table->string('reference_no')->unique();
            $table->integer('duration')->default(0);
            $table->enum('measureIn', ['days', 'weeks', 'months', 'years'])->default('months');
            $table->longText('description')->nullable();
            $table->text('location')->nullable();
            $table->string('coordinates')->nullable();
            $table->decimal('proposed_amount', $precision = 30, $scale = 2)->default(0);
            $table->decimal('evaluated_amount', $precision = 30, $scale = 2)->default(0);
            $table->decimal('approved_amount', $precision = 30, $scale = 2)->default(0);
            $table->integer('mobilization')->default(0);
            
            $table->enum('status', ['pending', 'proposed', 'invitation-to-bid', 'in-review', 'tenders', 'awarded', 'in-progress', 'audit', 'milestone-check', 'verified', 'completed', 'uncompleted'])->default('pending');
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
        Schema::dropIfExists('projects');
    }
}
