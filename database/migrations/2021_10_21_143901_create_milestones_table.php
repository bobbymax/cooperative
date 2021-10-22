<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->integer('duration')->default(0);
        
            $table->date('start_date')->nullable();
            $table->date('expiry')->nullable();
            $table->date('date_completed')->nullable();

            $table->longText('description')->nullable();

            $table->integer('percentage_pay')->default(0);
            $table->decimal('amount', $precision = 30, $scale = 2)->default(0);

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
        Schema::dropIfExists('milestones');
    }
}
