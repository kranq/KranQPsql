<?php

/*
  ------------------------------------------------------------------------------------------------
  Project		: KRQ 1.0.0
  Created By    	: Loganathan N
  Created Date  	: 20.07.2017
  Purpose       	: To handle location details
  ------------------------------------------------------------------------------------------------
 */

namespace App\Models;

use View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model {

    protected $table = 'localities';
    public $timestamps = true;
    public $incrementing = false;

    use SoftDeletes;

    protected $fillable = array('id','city_id', 'locality_name', 'status');

    /**
     * Get the city that owns the locality.
     */
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }

    /**
     * To get the Locality Name
     */
    public static function getLocationNameById($id)
    {
        $location = Location::where('id', '=', $id)->get();
        $location_name = '';
        if (count($location) > 0) {
            $location_name = ($location[0]->locality_name) ? $location[0]->locality_name : 'Nil';   
        }
        
        return $location_name;
    }

}
