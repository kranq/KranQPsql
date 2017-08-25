<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 19.07.2017
Purpose         : To create Service Provider table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->mediumText('name_sp');
            $table->string('slug', 200);
            $table->string('logo', 100)->nulllable();
            $table->string('city', 100)->nulllable();
            $table->mediumText('address')->nulllable();
            $table->enum('status_owner_manager', ['Owner','Manager']);
            $table->time('opening_hrs')->nulllable();            
            $table->time('closing_hrs')->nulllable();            
            $table->string('working_days', 50)->nulllable();
            $table->string('phone', 20)->nulllable();
            $table->string('website_link', 100)->nulllable();
            $table->string('googlemap_latitude', 100)->nulllable();
            $table->string('googlemap_longitude', 100)->nulllable();
            $table->string('email')->unique();
            $table->string('password', 64);
            $table->tinyInteger('order_by')->default(1);
            $table->tinyInteger('status')->default(1)->comment('Under Review, Approved, Rejected');
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
        // To delete
        Schema::dropIfExists('service_providers');
    }
}
