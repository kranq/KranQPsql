<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 07.09.2017
Purpose         : Add new field in service_providers table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterServiceProviderTableAddContactNo extends Migration
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
                    $table->string('owner_phone', 30)->nullable()->after('owner_designation');
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
