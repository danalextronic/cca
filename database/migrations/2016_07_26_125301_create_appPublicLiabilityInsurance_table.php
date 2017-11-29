<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppPublicLiabilityInsuranceTable extends Migration
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
        * 3) Business LIABILITY INSURANCE 
        */

        Schema::create('appPublicLiabilityInsurance', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('idpublicLiabilityInsurance');
            $table->string('insuranceCompany', 45)->nullable();
            $table->string('policyNumber', 45)->nullable();
            $table->integer('coverage')->nullable();
            $table->date('expiryDate')->nullable();
            $table->string('copy', 150)->nullable();
            $table->integer('applications_idapplication')->unsigned();
            $table->integer('applications_contractors_idcontractors');

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
        Schema::drop('appPublicLiabilityInsurance') ;
    }
}
