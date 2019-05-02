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
        Schema::create('test_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('action');
            $table->string('expected_result');
            $table->string('executed_date')->default('null');
            $table->string('status')->default('Passed');
            $table->string('actual_result')->default('null');
            $table->integer('testCase_id')->unsigned()->default(1);
            $table->foreign('testCase_id')
            ->references('id')
            ->on('test_cases');
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
