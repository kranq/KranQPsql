<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 20.07.2017
Purpose         : To remove columns from 'countries' table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCountriesTableRenameColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
                Schema::table('countries', function (Blueprint $table) {
                    $table->dropColumn(['country_code', 'country_name']);
                });
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
