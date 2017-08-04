<?php

/**
 * ===========================================================================================
 *  Created     : Vijay Felix Raj C
 *  Date        : 13/07/2017
 *  Email       : vijayfelixraj@gmail.com
 *  Purpouse    : Add New fields and insert the value to "users" table
 * ==========================================================================================
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Helpers\KranHelper;
use App\User;

class AlertUserTableInsetValueAndAddNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
          $table->softDeletes();
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
        //
    }

    /**
     * To insert the value by seed
     **/
    public function seed()
    {
        $save = array();
        $save['name'] = 'administrator';
        $save['email'] = 'admin@gmail.com';
        $save['password'] = bcrypt('admin123');
        User::create($save);
    }

}
