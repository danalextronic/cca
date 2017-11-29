<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTaxationTable extends Migration
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
        * 6) TAXATION
        */
        Schema::create('appTaxation', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('idtaxation');
            $table->string('taxationCopy', 45)->nullable();
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
        Schema::drop('appTaxation') ;

    }
}
