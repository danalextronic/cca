<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppBusinessIdentificationsTable extends Migration
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
        * 1) Business Identification 
        */

        Schema::create('appBusinessIdentifications', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('idbusinessIdentifications');
            $table->string('businessName', 45)->nullable();
            $table->string('tradingName', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('abn', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('mobile', 45)->nullable();
            $table->string('contactPerson', 45)->nullable();
            $table->string('trade', 45)->nullable();
            $table->string('companyTradeLicence', 45)->nullable();
            $table->integer('noEmployees')->nullable();
            $table->integer('noSubContractors')->nullable();
            $table->string('principalContractorName', 45)->nullable();
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
        Schema::drop('appBusinessIdentifications') ;
    }
}
