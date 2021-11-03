<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('document_type_id')->unsigned();
            $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
            $table->bigInteger('document_template_id')->unsigned();
            $table->foreign('document_template_id')->references('id')->on('document_templates')->onDelete('cascade');

            $table->string('title');
            $table->string('label')->unique();
            $table->string('reference_no')->unique();

            $table->longText('description')->nullable();

            $table->bigInteger('documentable_id')->unsigned();
            $table->string('documentable_type');

            $table->enum('status', ['pending', 'registered', 'in-review', 'completed'])->default('pending');
            $table->boolean('archived')->default(false);
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
        Schema::dropIfExists('documents');
    }
}
