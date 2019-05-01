<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('teststeps', function (Blueprint $table) {
=======
        Schema::create('test_steps', function (Blueprint $table) {
>>>>>>> 7bc7c62a3d94a6094a4f40d0e2699ccfed55db68
            $table->increments('id');
            $table->string('name');
            $table->string('action');
            $table->string('expected_result');
            $table->string('executed_date')->default('null');
            $table->string('status')->default('null');
            $table->string('actual_result')->default('null');
            $table->integer('testCase_id')->unsigned()->default(1);
            $table->foreign('testCase_id')
            ->references('id')
<<<<<<< HEAD
            ->on('testCases');
=======
            ->on('test_cases');
>>>>>>> 7bc7c62a3d94a6094a4f40d0e2699ccfed55db68
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
        Schema::dropIfExists('test_step');
    }
}
