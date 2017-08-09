<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Http\Requests\ServiceProviderRequest;

use URL;
use Image;
use Session;
use Response;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\City;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Location;
use App\Helpers\KranHelper;
use Rafwell\Simplegrid\Grid;
use App\Http\Requests\UserRequest;
use App\Models\ServiceProviderDetails;

//use Illuminate\Support\ServiceProvider;

class ServiceProviderController extends Controller
{
  protected $error = 'error';
  protected $success = 'success';
  protected $route = 'main.provider.index';
  protected $title = 'main.provider.title';
  protected $notfound = 'main.provider.notfound';
  protected $createmsg = 'main.provider.createsuccess';
  protected $updatemsg = 'main.provider.updatesuccess';
  protected $deletemsg = 'main.provider.deletesuccess';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To get the records details from the table
        $providers = ServiceProvider::join('categories','category_id','=','categories.id')->join('localities','location_id','=','localities.id')->join('cities','city','=','cities.id');

        $Grid = new Grid($providers,'');

        // To have header for the values
            $Grid->fields([
                  'name_sp'=>'Service Provider',
                 'locality_name'=>'Locality',
                 'city_name'=>'City',
                 'service_providers.created_at' => 'Submitted On',
                 'service_providers.status'=>'Status'
            ])
            ->processLine(function($row){
               //This function will be called for each row
               $row['status'] = KranHelper::getProviderStatus($row);
               $row['created_at'] = KranHelper::dateTime($row['created_at']);
               return $row;
            });
            $Grid->actionFields([
                 'service_providers.id' //The fields used for process actions. those not are showed
               ]);
            // To have actions for the records
               $Grid->action('View', URL::to('provider/show/{id}'))
                   ->action('Edit', URL::to('provider/edit/{id}'))
                   ->action('Delete', URL::to('provider/destroy/{id}'), [
                 'confirm'=>'Do you with so continue?',
                 'method'=>'DELETE',
             ]);

             // Pass the values to the view page
             return view('service_provider.index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = array();
      $data['categories'] = Category::orderBy('category_name','asc')->pluck('category_name', 'id');
      $data['cities'] = City::orderBy('city_name','asc')->pluck('city_name', 'id');
      $data['localities'] = Location::orderBy('locality_name','asc')->pluck('locality_name', 'id');
      $data['all_status'] = KranHelper::getProviderStatusDropdown();
      $data['opening_hrs'] = KranHelper::getTimeDropDown();
      $data['closing_hrs'] = KranHelper::getTimeDropDown();
      $data['working_days'] = KranHelper::getAllWeekDays();
      $data['selected_working_days'] = KranHelper::getAllWeekDays();
      return view('service_provider.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceProviderRequest $request)
    {
      $input = $request->all();
      $input = $request->except('_token');
      if($request->hasFile('logo')){
         $input['logo'] = ServiceProvider::upload_file($request, 'logo');
      }
      if(!empty($input['working_days'])){
        $input['working_days'] = implode(',',$input['working_days']);
      }
      $input['slug'] = KranHelper::convertString($input['name_sp']);
      $input['password'] = bcrypt($input['password']);
      ServiceProvider::create($input);
      return Redirect::route($this->route)->with($this->success, trans($this->createmsg));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['provider'] = ServiceProvider::findorfail($id);
        $created_at = $data['provider']->created_at;
        $data['provider']->created_date = Carbon::parse($created_at)->format('d/m/Y, h.i a');
        $data['provider']->category_id = Category::getCategoryNameById($data['provider']->category_id);
        $data['provider']->city = City::getCityNameById($data['provider']->city);
        $data['provider']->location_id = Location::getLocationNameById($data['provider']->location_id);
        $data['ratings'] = Rating::where('service_provider_id', '=', $id)->get();
        $data['users'] = User::orderBy('fullname', 'asc')->pluck('fullname', 'id');
        $data['reviews'] = Review::getServiceProviderReviewDetails($id);
        $data['service_providers'] = ServiceProviderDetails::where('service_provider_id', '=', $id)->get();
        //echo '<pre>';print_r($data['bookmarks']);exit;
        return view('service_provider.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['provider'] = ServiceProvider::findorFail($id);
      $data['categories'] = Category::orderBy('category_name','asc')->pluck('category_name', 'id');
      $data['cities'] = City::orderBy('city_name','asc')->pluck('city_name', 'id');
      $data['localities'] = Location::orderBy('locality_name','asc')->pluck('locality_name', 'id');
      $data['all_status'] = KranHelper::getProviderStatusDropdown();
      $data['opening_hrs'] = KranHelper::getTimeDropDown();
      $data['closing_hrs'] = KranHelper::getTimeDropDown();
      $data['working_days'] = KranHelper::getAllWeekDays();
      $data['selected_working_days'] = $data['provider']->working_days;
      if($data['selected_working_days']){
        $data['selected_working_days'] = explode(',',$data['selected_working_days']);
      }

      return view('service_provider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceProviderRequest $request, $id)
    {
      $input = $request->all();
      $provider  = ServiceProvider::findorFail($id);
      if($request->hasFile('logo')){
         $input['logo'] = ServiceProvider::upload_file($request, 'logo');
      }
      if(!empty($input['working_days'])){
        $input['working_days'] = implode(',',$input['working_days']);
      }
      $input['slug'] = KranHelper::convertString($input['name_sp']);
      if($input['password']){
        $input['password'] = bcrypt($input['password']);
      }else{
        $input['password'] = $provider->password;
      }
      $provider->fill($input);
      $provider->save();
      return Redirect::route($this->route)->with($this->success, trans($this->updatemsg));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
