<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('logs', function (Blueprint $table) {
           
           $table->increments('id');
           $table->integer('user_id')->nullable();
           $table->string('owner_type')->nullable();
           $table->integer('owner_id')->nullable();
           $table->text('old_value')->nullable();
           $table->text('new_value')->nullable();
           $table->string('type')->nullable();
           $table->string('route')->nullable();
           $table->string('ip', 45)->nullable();
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
        Schema::drop('logs') ;

    }
}
