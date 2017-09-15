<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Honest Raj A
Created Date    : 20.07.2017
Purpose         : To handle Country details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use URL;
use Session;
use Redirect;
use Response;
use App\User;
use App\Models\Country;
use App\Helpers\KranHelper;
use Rafwell\Simplegrid\Grid;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\ServiceProvider;

class CountryController extends Controller
{
  protected $error = 'error';
  protected $success = 'success';
  protected $route = 'main.country.index';
  protected $title = 'main.country.title';
  protected $notfound = 'main.country.notfound';
  protected $createmsg = 'main.country.createsuccess';
  protected $updatemsg = 'main.country.updatesuccess';
  protected $deletemsg = 'main.country.deletesuccess';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // To get the records details from the table
        $Grid = new Grid(Country::query(), 'Countries');

        // To have header for the values
        $Grid->fields([
            'id' => 'ID',
            'country_code'=>'Country Code',
            'country_name'=>'Country Name',
            'status'=>'Status',
        ]);
        // To have actions for the records
        $Grid->action('View', URL::to('country/show/{id}'))
              ->action('Edit', URL::to('country/edit/{id}'))
              ->action('Delete', URL::to('country/destroy/{id}'), [
                  'confirm'=>'Do you with so continue?',
                  'method'=>'DELETE',
        ]);
        // Pass the values to the view page
        return view('country/index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['btn'] = trans('main.save');
        return view('country.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $input = $request->all();
        Country::create($input);
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
        $data['country'] = Country::findorFail($id);
        return view('country.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['country'] = Country::findorFail($id);
        return view('country.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $input = $request->all();
        $country  = Country::findorFail($id);
        $country->fill($input);
        $country->save();
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
      $country = Country::findorFail($id);
      $country->delete();
      return Redirect::route($this->route)->with($this->error, trans($this->deletemsg));
    }
}
