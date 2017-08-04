<?php

namespace App\Models;

use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    protected $table = 'ratings';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','service_provider_id','user_id', 'rating_value','postted_on');

    /**
     * To fetch the details from the service provider table 
     */
    public static function getDetails($id)
    {
    	$ratings = Rating::where('user_id', '=', $id)->get();
    	for ($i=0; $i < count($ratings); $i++) { 
    		$rating = ServiceProvider::where('id', '=', $ratings[$i]->service_provider_id)->orderBy('name_sp','asc')->pluck('name_sp');
    		$ratings[$i]->service_provider_name = $rating[0];
    	}
    	return $ratings;
    }
}
