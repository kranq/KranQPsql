<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 25.07.2017
Purpose         : To add foreign key to city_id table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLocationsTableAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('locations', function (Blueprint $table) {
                $table->integer('city_id')->unsigned()->after('id');
            });
            if(Schema::hasTable('locations')){
                Schema::table('locations', function(Blueprint $table) {
                    $table->foreign('city_id')->references('id')->on('cities');
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
