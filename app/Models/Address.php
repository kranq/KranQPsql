<?php
/*
------------------------------------------------------------------------------------------------
Project 	  : KRQ
Created By    : Vijay Felix Raj C
Email Address : vijayfelixraj@gmail.com
Created Date  : 07.09.2017
Purpose       : To handle Address
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $table = 'contact_details';
    //public $timestamps = true;
    public $incrementing=false;
    //use SoftDeletes;
    protected $fillable = array('id','address','phone_no','email');
}
