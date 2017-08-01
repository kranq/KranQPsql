<?php

namespace App\Models;

use App\Helpers\KranHelper;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    //
    protected $table = 'reviews';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','service_provider_id','user_id', 'reviews','status','postted_on');

    /**
     * To fetch the details from the service provider table 
     */
    public static function getReviewDetails($id)
    {
    	$reviews = Review::where('user_id', '=', $id)->get();
    	for ($i=0; $i < count($reviews); $i++) { 
    		$reviews[$i]->postted_on = KranHelper::dateTime($reviews[$i]->postted_on);
    		$review = ServiceProvider::where('id', '=', $reviews[$i]->service_provider_id)->orderBy('name_sp','asc')->pluck('name_sp');
    		$reviews[$i]->service_provider_name = $review[0];
    	}
    	//echo '<pre>';print_r($reviews);exit;
    	return $reviews;
    }
}
