<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 07.09.2017
Purpose         : To create service_provider_category_services table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table) {
            $table->increments('id')->index();
            $table->mediumText('address', 250);
            $table->string('phone', 30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
