<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 11.08.2017
Purpose         : To remove value from the dropdown table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDropDownTalbeRemoveValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::table('dropdown_helper', function(Blueprint $table){
                DB::statement("DELETE FROM dropdown_helper WHERE group_code='002' AND key_code='1'");
                DB::statement("DELETE FROM dropdown_helper WHERE group_code='002' AND key_code='3'");
            });
        } catch (Execption $e){}
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
