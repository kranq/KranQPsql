<?php
/*
------------------------------------------------------------------------------------------------
Project			    : KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 18.07.2017
Purpose       	: To create Category table
------------------------------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCagtegoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
          $table->increments('id')->index();
          $table->string('category_name', 200)->nullable();
          $table->string('slug', 200)->nullable();
          $table->string('description', 200)->nullable();
          $table->string('category_image', 255)->nullable();
          $table->enum('status', ['Active', 'Inactive'])->default('Active');
          $table->tinyInteger('order_by')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
