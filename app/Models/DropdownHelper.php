<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 26.07.2017
Purpose         : To handle dropdown helper
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DropdownHelper extends Model
{
    protected $table = 'dropdown_helper';
    public $timestamps = true;
    protected $fillable = array('group_code', 'group_name', 'key_code', 'value');
}
