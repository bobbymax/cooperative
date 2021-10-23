<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->bigInteger('company_id')->default(0);
            $table->bigInteger('brand_id')->default(0);

            $table->string('title');
            $table->string('label')->unique();
            $table->string('code')->unique();

            $table->longText('description')->nullable();

            $table->bigInteger('quantity')->default(0);
            $table->decimal('value', $precision = 30, $scale = 2)->default(0);

            $table->integer('expiration')->default(0);
            $table->enum('measure', ['days', 'weeks', 'months', 'years'])->default('months');
            $table->enum('status', ['pending', 'registered', 'verification', 'out-of-stock'])->default('pending');
            $table->boolean('inStock')->default(false);
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
        Schema::dropIfExists('products');
    }
}
