<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 20.07.2017
Purpose         : To alter 'user' table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::create('user', function(Blueprint $table){
                $table->increments('id');
                $table->string('fullname');
                $table->string('profile_picture', 100)->nullable();
                $table->mediumText('address')->nullable();
                $table->string('mobile', 20)->nullable();
                $table->string('email', 50)->unique();
                $table->string('password', 64);
                $table->string('auth_key', 32);
                $table->string('password_reset_token', 255)->nullable();
                $table->tinyInteger('register_mode', 1)->default(1)->nullable();
                $table->tinyInteger('been_there_status', 1)->default(2)->comment('1-Yes, 2-No');
                $table->enum('status', ['Active', 'Inactive']);
                $table->timestamp('registered_on');
                $table->timestamp('last_logged_on');
                $table->timestamps();
                $table->softDeletes();       
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
        Schema::dropIfExists('user');
    }
}
