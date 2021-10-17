<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_category_id')->unsigned();
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('label')->unique();
            $table->string('reference_no')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->text('address')->nullable();
            $table->string('profile')->nullable();
            $table->enum('status', ['registered', 'approved', 'denied'])->default('registered');
            $table->boolean('blacklisted')->default(false);
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
        Schema::dropIfExists('companies');
    }
}
