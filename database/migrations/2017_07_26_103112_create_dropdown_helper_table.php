<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 26.07.2017
Purpose         : To create dropdown helper table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropdownHelperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropdown_helper', function(Blueprint $table){
                $table->string('group_code', 50);
                $table->string('group_name', 100);
                $table->string('key_code', 5);
                $table->string('value', 100);
            });
        $this->seed();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // To delete the value from the table
        Schema::drop('dropdown_helper');
    }

    /**
     * To set the seed value
     **/
    public function seed()
    {
        DB::table('dropdown_helper')->insert(array(
        array(
            'group_code'=>'001',
            'group_name'=>'Status',
            'key_code'=>'1',
            'value'=>'Active'
            ),
            array(
            'group_code'=>'001',
            'group_name'=>'Status',
            'key_code'=>'2',
            'value'=>'Inactive'
            ),
            array(
            'group_code'=>'002',
            'group_name'=>'Register Mode',
            'key_code'=>'1',
            'value'=>'Email'
            ),
            array(
            'group_code'=>'002',
            'group_name'=>'Register Mode',
            'key_code'=>'2',
            'value'=>'Facebook'
            ),
            array(
            'group_code'=>'002',
            'group_name'=>'Register Mode',
            'key_code'=>'3',
            'value'=>'G+'
            ),
        ));
    }
}