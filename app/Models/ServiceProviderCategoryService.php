<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProviderCategoryService extends Model
{
    protected $table = 'service_provider_category_services';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','service_provider_id','category_id','service_id');
	
	/**
     * To fetch the records based Category id
     */
    public static function getSPCategoryService($id,$category_id)
    {
        $result = '';
        if ($id) {
        	$categoryServiceSP = ServiceProviderCategoryService::where('id',$id)->where('category_id',$category_id)->get();
        	if (count($categoryServiceSP)>0) {
        		$result =  $categoryServiceSP[0]->service_id;
        	}
        }
    	return $result;
    }

}
