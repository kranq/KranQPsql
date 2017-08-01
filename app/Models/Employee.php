<?php
/*
------------------------------------------------------------------------------------------------
Created By    : Vijay Felix Raj C
Email Address : vijayfelixraj@gmail.com
Created Date  : 15.07.2017
Purpose       : Add Employees
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = 'employee';
    public $timestamps = true;
	  public $incrementing=false;
	  use SoftDeletes;
    protected $fillable = array('id','first_name','last_name', 'gender','emp_no', 'birth_date');

}
