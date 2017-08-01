<?php
/*
------------------------------------------------------------------------------------------------
Project		: KRQ 1.0.0
Created By    	: Loganathan N
Created Date  	: 20.07.2017
Purpose       	: To handle location details
------------------------------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\City;
use App\Http\Requests\LocationRequest;

use URL;
use Image;
use Session;
use Response;
use Redirect;
use Rafwell\Simplegrid\Grid;
use Illuminate\Support\ServiceProvider;

class LocationController extends Controller
{

  protected $error = 'error';
  protected $success = 'success';
  protected $route = 'main.location.index';
  protected $title = 'main.location.title';
  protected $notfound = 'main.location.notfound';
  protected $createmsg = 'main.location.createsuccess';
  protected $updatemsg = 'main.location.updatesuccess';
  protected $deletemsg = 'main.location.deletesuccess';
  protected $referencemsg = 'main.location.referencesuccess';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // To get the records details from the table
        $localities = Location::join('cities','city_id','=','cities.id');

        $Grid = new Grid($localities, 'localities');

        // To have header for the values
          $Grid->fields([
                  //'localities.id' => 'ID',
                  'city_name'=>'City',
                  'locality_name'=>'Locality Name',
                  'localities.status'=>'Status'
              ]);
              $Grid->actionFields([
                  'localities.id' //The fields used for process actions. those not are showed
                ]);
            // To have actions for the records
                $Grid->action('View', URL::to('location/show/{id}'))
                    ->action('Edit', URL::to('location/edit/{id}'))
                    ->action('Delete', URL::to('location/destroy/{id}'), [
                  'confirm'=>'Do you with so continue?',
                  'method'=>'DELETE',
              ]);

              // Pass the values to the view page
              return view('location.index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = array();       
       $data['cities'] = City::orderBy('city_name','asc')->pluck('city_name', 'id');
       return view('location.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $input = $request->all();       
        $input = $request->except('_token');
       
        /*
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        */
        
        Location::create($input);
        return Redirect::route($this->route)->with($this->success, trans($this->createmsg));
    }

  /**
   * Display the specified resource.
   * 
   * @param type $id
   * @return type
   */
    public function show($id)
    {
        $data['location'] = Location::findorFail($id);      
       $cityId = $data['location']->city_id;        
        $data['cities'] = City::where('id', '=', $cityId)->get();        
        return view('location.view', $data);
    }
       
    /**
     * Show the form for editing the specified resource.
     * @param type $id
     * @return type
     */
    public function edit($id)
    {
         $data['location'] = Location::findorFail($id);
         $data['cities'] = City::orderBy('city_name','asc')->pluck('city_name', 'id');
        return view('location.edit', $data);
    }

  
    /**
     * Update the specified resource in storage.
     * @param \App\Http\Controllers\Request $request
     * @param Location $location
     * @return type
     */
    public function update(LocationRequest $request, $id)
    {
        $input = $request->all();
        $location  = Location::findorFail($id);        
        $location->fill($input);
        $location->save();
        return Redirect::route($this->route)->with($this->success, trans($this->updatemsg));
    }

       
    /**
     * Remove the specified resource from storage.
     * @param type $id
     * @return type
     */
    public function destroy($id)
    {
      $location = Location::findorFail($id);
      if (count($location->city_id) > 0) {
        return Redirect::route($this->route)->with($this->success, trans($this->referencemsg));  
      } else {
        $location->delete();
        return Redirect::route($this->route)->with($this->success, trans($this->deletemsg));  
      }
      
    }
}
