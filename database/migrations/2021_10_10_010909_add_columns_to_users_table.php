<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('designation')->default('staff')->after('email');
            $table->string('location')->nullable()->after('designation');
            $table->string('staff_no')->unique()->nullable()->after('id');
            $table->bigInteger('grade_level_id')->default(0)->after('staff_no');
            $table->bigInteger('department_id')->default(0)->after('grade_level_id');
            $table->string('firstname')->after('department_id');
            $table->string('middlename')->nullable()->after('firstname');
            $table->string('surname')->after('middlename');
            $table->date('date_of_birth')->nullable()->after('password');
            $table->date('date_joined')->nullable()->after('date_of_birth');
            $table->text('address')->nullable()->after('date_joined');
            $table->enum('status', ['in-service', 'retired', 'removed', 'transfer-of-service'])->default('in-service')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn('firstname');
            $table->dropColumn('middlename');
            $table->dropColumn('surname');
            $table->dropColumn('designation');
            $table->dropColumn('location');
            $table->dropColumn('staff_no');
            $table->dropColumn('grade_level_id');
            $table->dropColumn('department_id');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('date_joined');
            $table->dropColumn('address');
            $table->dropColumn('status');
        });
    }
}
