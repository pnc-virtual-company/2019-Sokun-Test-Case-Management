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
        Schema::create('testcase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('creator');
            $table->string('description');
            $table->string('status');  
            $table->integer('campaign_id')->unsigned();
            $table->foreign('campaign_id')
            ->references('id')
            ->on('campaign');
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
