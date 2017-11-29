<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppIncomeProtectionInsuranceTable extends Migration
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
        * 5) INCOME PROTECTION INSURANCE
        */

        
        Schema::create('appIncomeProtectionInsurance', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('idincomeProtectionInsurance');
            $table->integer('incomeProtectionInsuranceExist')->nullable();
            $table->string('insuranceCompany', 45)->nullable();
            $table->string('namePersonCovered', 45)->nullable();
            $table->string('policyNumber', 45)->nullable();
            $table->date('expiryDate')->nullable();
            $table->integer('applications_idapplication')->unsigned();
            $table->integer('applications_contractors_idcontractors');
            $table->string('copy', 45)->nullable();

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
        Schema::drop('appIncomeProtectionInsurance') ;
    }
}
