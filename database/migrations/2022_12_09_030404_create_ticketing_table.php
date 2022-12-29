<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketings', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();

            $table->increments('id');
            $table->string('summary');
            $table->text('description');
            $table->string('status');
            // $table->integer('priority_id')->unsigned();
            // $table->integer('user_id')->unsigned();
            // $table->integer('agent_id')->unsigned();
            // $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('ticketings');
    }
};
