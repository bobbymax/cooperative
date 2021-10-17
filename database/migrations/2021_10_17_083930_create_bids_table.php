<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->decimal('amount', $precision = 30, $scale = 2)->default(0);
            $table->string('proposal')->nullable();
            $table->string('invitation')->nullable();
            $table->string('technical_document')->nullable();
            $table->string('financial_document')->nullable();
            $table->longText('description')->nullable();
            $table->integer('score')->default(0);
            $table->enum('status', ['registered', 'draft', 'invitation', 'tenders', 'closed'])->default('registered');
            $table->boolean('awarded')->default(false);
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
        Schema::dropIfExists('bids');
    }
}
