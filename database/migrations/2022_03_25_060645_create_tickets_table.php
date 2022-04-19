<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('requested_user')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->string('type');
            $table->bigInteger('dept_id')->unsigned()->index();
            $table->bigInteger('section_id')->unsigned()->index();
            $table->string('priority');
            $table->boolean('urgent')->default(0);
            $table->string('subject');
            $table->longText('details');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('requested_user')->references('id')->on('users');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('status_id')->references('id')->on('ticket_status');
            $table->softDeletes();
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
        Schema::dropIfExists('tickets');
    }
}
