<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 11.08.2017
Purpose         : To add and update values from the dropdown table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDropdownTableAddAndUpdateFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->seed();
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

    /**
     * To set the seed value
     **/
    public function seed()
    {
        DB::table('dropdown_helper')->insert(array(
            array(
            'group_code'=>'002',
            'group_name'=>'Register Mode',
            'key_code'=>'1',
            'value'=>'Mobile'
            ),
        ));
    }
}
