<?php
/*
------------------------------------------------------------------------------------------------
Project			: KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 17.08.2017
Purpose       	: To handle Category Service details
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryService extends Model
{
    protected $table = 'category_services';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','category_id','service_id');
    

    /**
     * To fetch the records based Category id
     */
    public static function getCategoryService($id)
    {
        $result = '';
        if ($id) {
        	$categoryService = CategoryService::where('category_id', '=', $id)->get();
        	if (count($categoryService)>0) {
        		$result =  $categoryService[0]->service_id;
        	}
        }
    	return $result;
    }
}
