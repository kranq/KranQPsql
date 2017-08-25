<?php
/*
------------------------------------------------------------------------------------------------
Project			: KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 18.07.2017
Purpose       	: To handle employees details
------------------------------------------------------------------------------------------------
*/
namespace App\Models;

use View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    public $incrementing=false;
    use SoftDeletes;
    protected $fillable = array('id','category_name','service_id','slug', 'description','category_image', 'status', 'order_by');


    public static function upload_file($request, $file, $id =  false)
    {
        if (!empty($id)) {
            $fileDetails = Category::where('id', '=', $id)->get();
            $oldFileName = $fileDetails[0]->category_image;
            if ($request->hasFile($file) && $request->file($file)->getSize() > 0) {
                $destinationPath = base_path() . "/uploads/category/";
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0700);
                }
                // To unlink the old file
                if ($oldFileName) {
                        @unlink($destinationPath.'/'.$oldFileName);
                }
                $filename   = $request->file($file)->getClientOriginalName();
                $request->file($file)->move($destinationPath, $filename);
            }
        } else {
            if ($request->hasFile($file) && $request->file($file)->getSize() > 0) {
                $destinationPath = base_path() . "/uploads/category/";
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0700);
                }
                $filename   = $request->file($file)->getClientOriginalName();
                $request->file($file)->move($destinationPath, $filename);
            }
        }
        return $filename;
    }

    public static function getCategoryNameById($id)
    {
        $category = Category::where('id', '=', $id)->get();
        return $category[0]->category_name;
    }

}
