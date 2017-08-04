<?php
/*
------------------------------------------------------------------------------------------------
Project 	  : KRQ
Created By    : Vijay Felix Raj C
Email Address : vijayfelixraj@gmail.com
Created Date  : 24.07.2017
Purpose       : To handle Bookmarks
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    //
    protected $table = 'bookmarks';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','service_provider_id','user_id', 'bookmarked_on');

    /**
     * To fetch the details from the service provider table 
     */
    public static function getBookMarkDetails($id)
    {
    	$bookmarks = Bookmark::where('user_id', '=', $id)->get();
    	for ($i=0; $i < count($bookmarks); $i++) { 
    		$bookmark = ServiceProvider::where('id', '=', $bookmarks[$i]->service_provider_id)->orderBy('name_sp','asc')->pluck('name_sp');
    		$bookmarks[$i]->service_provider_name = $bookmark[0];
    	}
    	return $bookmarks;
    }
}
