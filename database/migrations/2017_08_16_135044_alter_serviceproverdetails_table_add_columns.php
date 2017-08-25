<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 16.08.2017
Purpose         : To add new field in service provider details table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterServiceproverdetailsTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            if (Schema::hasTable('service_providers_details')) {
                Schema::table('service_providers_details', function(Blueprint $table) {
                    $table->enum('approvel', ['1', '0'])->nullable()->default(0)->after('image');
                    $table->enum('rejected', ['1', '0'])->nullable()->default(0)->after('approvel');
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
