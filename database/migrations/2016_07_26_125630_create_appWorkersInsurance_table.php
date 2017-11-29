<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppWorkersInsuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        * Form Questions
        * 4) WORKERS COMPENSATION INSURANCE
        */


        Schema::create('appWorkersInsurance', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('idWorkersCompensationInsurance');
            $table->integer('workersInsuranceExist')->nullable();
            $table->string('workersInsurancePolicyNumber', 45)->nullable();
            $table->date('workersInsuranceExpiryDate')->nullable();
            $table->integer('workersInsuranceEstimatedWages')->nullable();
            $table->integer('workersInsuranceNumberWorkers')->nullable();
            $table->integer('applications_idapplication')->unsigned();
            $table->integer('applications_contractors_idcontractors');
            $table->string('copy',80)->nullable ;
            $table->foreign('applications_idapplication')
                ->references('idapplication')->on('applications');

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
        Schema::drop('appWorkersInsurance') ;
    }
}
