<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPages extends Model
{
	protected $table = 'cms_pages';
	public $timestamps = false;
	protected $fillable = array('id','title', 'slug','description');
    //
}
