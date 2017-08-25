<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 17.08.2017
Purpose         : To update the fields in service provider details table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterServiceProviderDetailsAlterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // to update the columns
        try {
            if (Schema::hasTable('service_providers_details')) {
                Schema::table('service_providers_details', function(Blueprint $table) {
                    $table->dropColumn('rejected');
                    $table->dropColumn('approvel');
                });
            }
        } catch (Exception $e) {}
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
