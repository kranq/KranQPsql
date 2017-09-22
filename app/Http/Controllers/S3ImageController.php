<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Storage;
class S3ImageController extends Controller
{

    /**
    * Create view file
    *
    * @return void
    */
    public function imageUpload()
    {
    	return view('image-upload');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
   
	public function imageUploadPost(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
		//print_r(Storage::disk('s3')->url('1505813667.gif'));exit;
		print_r(Storage::makeDirectory('/uploads/Photos/'));exit;
        $t = Storage::disk('s3')->putFile('Photos', new File('/uploads/Photos/'));
        $imageName = Storage::disk('s3')->url($imageName);

    	return back()
    		->with('success','Image Uploaded successfully.')
    		->with('path',$imageName);
    }
}