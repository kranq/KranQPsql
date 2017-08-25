<?php
/*
------------------------------------------------------------------------------------------------
Project			: KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 15.07.2017
Purpose       	: To handle Category details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;
use DB;
use URL;
use Image;
use Session;
use Response;
use Redirect;
use App\Models\Service;
use App\Models\Category;
use App\Models\CategoryService;
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
  protected $referencemsg = 'main.referencesuccess';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category  = Category::query()->orderBy('id', 'desc');
        // To get the records details from the table
        $Grid = new Grid($category, 'categories');

        // To have header for the values
          $Grid->fields([
                  //'id' => 'ID',
                  'category_name'=>'Category Name',
                  //'slug'=>'Slug',
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
        if($request->hasFile('category_image')){
           $input['category_image'] = Category::upload_file($request, 'category_image');
        }
        $last = Category::create($input);
        // To get the Last Insert id and insert the value in the Category Service Table by Category Name
        $lastRecord = Category::where('category_name','=' ,$last->category_name)->get();
        $categoryInput['category_id'] = $lastRecord[0]->id;
        $categoryInput['service_id'] = implode(',', $input['service_id']);
        CategoryService::create($categoryInput);
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
        $data['CategoryService'] = CategoryService::getCategoryService($id);
        if (count($data['CategoryService'])>0) {    
            $service = explode(',',$data['CategoryService']);
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
        if($request->hasFile('category_image')){
           $input['category_image'] = Category::upload_file($request, 'category_image', $id);
        }
        // To get the Last Insert id and insert the value in the Category Service Table by Category Name
        $service = implode(',', $input['service_id']);
        if (!empty($service)) {
            $categoryService = CategoryService::where('category_id', '=', $id)->get();
            if (count($categoryService) > 0) {
                $result =  DB::statement('UPDATE category_services set service_id="'.$service.'" where category_id='.$id);    
            } else {
                $categoryInput['category_id'] = $id;
                $categoryInput['service_id'] = $service;
                CategoryService::create($categoryInput);   
            }
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
            return Redirect::route($this->route)->with($this->error, trans($this->deletemsg));
        }
    }
}