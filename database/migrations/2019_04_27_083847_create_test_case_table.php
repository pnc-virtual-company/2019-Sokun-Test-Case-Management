<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('testcases', function (Blueprint $table) {
=======
        Schema::create('test_cases', function (Blueprint $table) {
>>>>>>> 7bc7c62a3d94a6094a4f40d0e2699ccfed55db68
            $table->increments('id');
            $table->string('name');
            $table->string('creator');
            $table->string('description');
            $table->string('status');  
            $table->integer('campaign_id')->unsigned();
            $table->foreign('campaign_id')
            ->references('id')
            ->on('campaigns');
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
        Schema::dropIfExists('test_case');
    }
}
