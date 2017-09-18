<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 15.09.2017
Purpose         : Add date and time field in service provider table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterServiderProviderTableAddHoursFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            if (Schema::hasTable('service_providers')) {
                Schema::table('service_providers', function(Blueprint $table) {
                    $table->smallInteger('working_saturdays')->nullable()->after('working_days');
                    $table->smallInteger('working_sundays')->nullable()->after('working_saturdays');
                    $table->smallInteger('saturday_opening_hrs')->nullable()->after('working_sundays');
                    $table->smallInteger('saturday_closing_hrs')->nullable()->after('saturday_opening_hrs');
                    $table->smallInteger('sunday_opening_hrs')->nullable()->after('saturday_closing_hrs');
                    $table->smallInteger('sunday_closing_hrs')->nullable()->after('sunday_opening_hrs');
                });
            }
        } catch(Exception $e) {}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
