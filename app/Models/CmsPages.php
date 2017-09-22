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
	
	/**
     * To fetch the records based on cms slug
     */
    public static function getCmsData($slug)
    {
        $result = '';
        if ($slug) {
        	$cmsData = CmsPages::where('slug', '=', $slug)->get();
        	if (count($cmsData)>0) {
        		//$result =  $cmsData[0]->title;
				$result =  $cmsData[0];
        	}
        }
    	return $result;
    }
}
