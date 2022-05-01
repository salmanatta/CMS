<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('FA_NO')->nullable()->index();
            $table->string('DESCRIPTION')->nullable()->index();
            $table->string('MAJOR_TYPE')->nullable();
            $table->string('BRAND')->nullable();
            $table->string('MODEL')->nullable();
            $table->string('MAKE_YEAR')->nullable();
            $table->string('TECH_INFO_1')->nullable();
            $table->string('TECH_INFO_2')->nullable();
            $table->string('TECH_INFO_3')->nullable();
            $table->string('SNO')->nullable();
            $table->date('INSTALL_DATE')->nullable();
            $table->string('VENDOR')->nullable();
            $table->string('BUILDING')->nullable();
            $table->string('FLOOR')->nullable();
            $table->string('ROOM')->nullable();
            $table->bigInteger('DEPT_ID')->unsigned()->index();
            $table->string('CUSTODIAN')->nullable();
            $table->bigInteger('CREATED_BY')->unsigned()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('DEPT_ID')->references('id')->on('departments');
            $table->foreign('CREATED_BY')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
