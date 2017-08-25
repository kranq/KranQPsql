<?php
/*
------------------------------------------------------------------------------------------------
Project			    : KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 15.07.2017
Purpose       	: To handle Category details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use URL;
use Image;
use Session;
use Response;
use Redirect;
use Validator;
use App\Models\Service;
use App\Models\Category;
use App\Models\ServiceProvider;
use Rafwell\Simplegrid\Grid;
use App\Models\DropdownHelper;
//use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
//use Illuminate\Support\ServiceProvider;

class CategoryController extends Controller
{
  protected $error = 'error';
  protected $success = 'success';
  protected $route = 'main.category.index';
  protected $title = 'main.category.title';
  protected $notfound = 'main.category.notfound';
  protected $createmsg = 'main.category.createsuccess';
  protected $updatemsg = 'main.category.updatesuccess';
  protected $deletemsg = 'main.category.deletesuccess';
  protected $referencemsg = 'main.category.referencesuccess';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category  = Category::query()->orderBy('id', 'desc');
		$category  = Category::query();
        // To get the records details from the table
        $Grid = new Grid($category, 'categories');

        // To have header for the values
          $Grid->fields([
                  //'id' => 'ID',
                  'category_name'=>'Category Name',
                  'slug'=>'Slug',
                  'order_by'=>'Order By',
                  'status'=>'Status'
              ])
                ->actionFields([
                    'id' //The fields used for process actions. those not are showed
                ]);
            // To have actions for the records
            //->action('View', URL::to('category/show/{id}'))
                $Grid->action('View', URL::to('category/show/{id}'), ['class'=>'fa fa-eye'])
                    ->action('Edit', URL::to('category/edit/{id}'), ['class'=>'fa fa-edit'])
                    ->action('Delete', URL::to('category/destroy/{id}'), [
                  'confirm'=>'Do you with so continue?',
                  'method'=>'DELETE',
				  'class'=>'fa fa-trash-o',
              ]);
              // Pass the values to the view page
              return view('category.index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['status'] = DropdownHelper::where('group_code', '001')->orderBy('key_code', 'asc')->pluck('value', 'key_code');
        $data['services'] = Service::orderBy('service_name', 'asc')->pluck('service_name', 'id')->all();
        $data['add'] = trans('main.add');
        return view('category.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        $input = $request->except('_token');
        $input['service_id'] = implode(',', $input['service_id']);
        if($request->hasFile('category_image')){
           $input['category_image'] = Category::upload_file($request, 'category_image');
        }
		/*if(!$request->hasFile('category_image'))
			return Response::json(['error' => 'No File Sent']);
		if(!$request->file('category_image')->isValid())
			return Response::json(['error' => 'File is not valid']);
		$file = $request->file('category_image');
		$v = Validator::make(
			$request->all(),
			['file' => 'required|mimes:jpeg,jpg|max:8000']
		);
		
		if($v->fails())
			return Response::json(['error' => $v->errors()]);
		//input a row into the database to track the image (if needed)
		$image = $gallery->images()->create([
			'id' => null,
			'ext' => $request->file('category_image')->guessExtension()
		]);
		//Use some method to generate your filename here. Here we are just using the ID of the image
		$filename = $image->id . '.' . $image->ext;
		//Push file to S3
		Storage::disk('s3')->put('uploads/' . $filename, file_get_contents($file));
		//Use this line to move the file to local storage & make any thumbnails you might want
		//$request->file('file')->move('/full/path/to/uploads', $filename);
	
		//Thumbnail as needed here. Then use method shown above to push thumbnails to S3
	
		//If making thumbnails uncomment these to remove the local copy.
		//if(Storage::disk('s3')->exists('uploads/' . $filename))
		//Storage::disk()->delete('uploads/' . $filename);
		//If we are still here we are good to go.
		return Response::json(['OK' => 1]);*/
		
			
        Category::create($input);
        return Redirect::route($this->route)->with($this->success, trans($this->createmsg));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['category'] = Category::findorFail($id);
        if ($data['category']->service_id) {    
            $service = explode(',',$data['category']->service_id);
        }
        if (!empty($service)) {
            foreach ($service as $value) {
                $data['services'][] = Service::where('id',$value)->pluck('service_name');
            }
        }
        
        //echo '<pre>';  print_r($data['services']);exit;
        //$data['services'] = Service::orderBy('service_name', 'asc')->pluck('service_name', 'id')->all();
        return view('category.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::findorFail($id);
        if ($data['category']->service_id) {    
            $service = explode(',',$data['category']->service_id);
        }
     
        $data['status'] = DropdownHelper::where('group_code', '001')->orderBy('key_code', 'asc')->pluck('value', 'key_code');
        $data['services'] = Service::orderBy('service_name', 'asc')->pluck('service_name', 'id')->all();
        $data['service'] = Service::whereIn('id',$service)->pluck('id');
        $data['add'] = trans('main.edit');
        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->all();
        $category  = Category::findorFail($id);
        $input['service_id'] = implode(',', $input['service_id']);
        if($request->hasFile('category_image')){
           $input['category_image'] = Category::upload_file($request, 'category_image', $id);
        }
        $category->fill($input);
        $category->save();
        return Redirect::route($this->route)->with($this->success, trans($this->updatemsg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceProvider = ServiceProvider::where('category_id', '=', $id)->get();
        if (count($serviceProvider) > 0) {
            return Redirect::route($this->route)->with($this->success, trans($this->referencemsg));
        } else {
            $category = Category::findorFail($id);
            $category->delete();
            return Redirect::route($this->route)->with($this->success, trans($this->deletemsg));
        }
    }
}
