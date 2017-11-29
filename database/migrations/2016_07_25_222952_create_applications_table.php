<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table applications with contractor id -> user id as a foreign key .

        Schema::create('applications', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idapplication');
            $table->string('applicationNumber', 100);
            $table->string('ref', 100);
            $table->string('applicationType', 200);
            $table->string('applicationStatus',45) ;
            $table->integer('contractors_idcontractors')->unsigned();
            $table->foreign('contractors_idcontractors')->references('id')->on('users')->nullable();
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
        Schema::drop('applications') ;
    }
}
