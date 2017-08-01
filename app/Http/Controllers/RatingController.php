<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Honest Raj C
Created Date    : 22.07.2017
Purpose         : To handle Ratings details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use URL;
use Session;
use Redirect;
use Response;
use App\Models\User;
use App\Models\Rating;
use App\Helpers\KranHelper;
use Rafwell\Simplegrid\Grid;
use App\Http\Requests\Request;
//use Illuminate\Support\ServiceProvider;
use App\Models\ServiceProvider;
class RatingController extends Controller
{
    protected $error = 'error';
    protected $success = 'success';
    protected $route = 'main.rating.index';
    protected $title = 'main.rating.title';
    protected $notfound = 'main.rating.notfound';
    protected $createmsg = 'main.rating.createsuccess';
    protected $updatemsg = 'main.rating.updatesuccess';
    protected $deletemsg = 'main.rating.deletesuccess';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To get the records details from the table
        $serviceProvider=Rating::join('service_providers','service_provider_id','=','service_providers.id')->join('user','user_id','=','user.id');
        $Grid = new Grid($serviceProvider, 'ratings');
        // To have header for the values
        $Grid->fields([
              'name_sp'=>'Service Provider',
              'fullname'=>'User',
              'rating_value' => 'Rating',
              'postted_on'=>'Posted On'
              ])
        ->processLine(function($row){
            $row['postted_on'] = KranHelper::dateTimeFormat($row);
            return $row;
        });
         $Grid->actionFields([
                  'ratings.id' //The fields used for process actions. those not are showed
                ]);
        // To have actions for the records
        $Grid//->action('View', URL::to('rating/show/{id}'))
             // ->action('Edit', URL::to('rating/edit/{id}'))
             ->action('Delete', URL::to('rating/destroy/{id}'), [
              'confirm'=>'Do you with so continue?',
              'method'=>'DELETE',
        ]);
        // Pass the values to the view page
        return view('rating.index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        //$data['serviceProvider'] = ServiceProvider::orderBy('id', 'asc')->pluck('fullname', 'id');
        $data['users'] = User::orderBy('id', 'asc')->pluck('fullname', 'id');
        return view('rating.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
      Rating::create($input);
      return Redirect::route($this->route)->with($this->success, trans($this->createmsg));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['rating'] = Rating::findorFail($id);  
       $serviceProviderId = $data['rating']->service_provider_id;
       $user = $data['rating']->user_id;        
        $data['service_providers'] = ServiceProvider::where('id', '=', $serviceProviderId)->get();      
        $userData['user'] = User::where('id', '=', $user)->get();       
        return view('rating.view', $data,$userData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
       $data['rating'] = Rating::findorFail($id);
        return view('rating.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
         $input = $request->all();
        $rating  = Rating::findorFail($id);
        $rating->fill($input);
        $rating->save();
        return Redirect::route($this->route)->with($this->success, trans($this->updatemsg));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::findorFail($id);
      $rating->delete();
      return Redirect::route($this->route)->with($this->success, trans($this->deletemsg));
    }
}
