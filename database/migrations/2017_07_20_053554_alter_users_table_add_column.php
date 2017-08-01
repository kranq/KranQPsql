<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 20.07.2017
Purpose         : To alter users table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
                Schema::table('users', function(Blueprint $table){
                    $table->renameColumn('name', 'first_name')->change();
                    $table->string('last_name', 50)->after('name');
                    $table->string('profile_picture', 100)->nullable()->after('last_name');
                    $table->enum('status', ['Active', 'Inactive'])->after('remember_token');
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
