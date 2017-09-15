<?php

/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 09.08.2017
Purpose         : To handle Service Provider Details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use DB;
use Redirect;
use Illuminate\Http\Request;
use App\Models\ServiceProviderDetails;

class ServiceProviderDetailsController extends Controller
{

    protected $error = 'error';
    protected $success = 'success';
    protected $route = 'main.provider.index';
    protected $title = 'main.provider.title';
    protected $notfound = 'main.provider.notfound';
    protected $createmsg = 'main.provider.createsuccess';
    protected $updatemsg = 'main.provider.updatesuccess';
    protected $deletemsg = 'main.serviceproviderdetails.deletesuccess';
    protected $approvelmsg = 'main.serviceproviderdetails.approvelsuccess';
    protected $approvelcancelmsg = 'main.serviceproviderdetails.approvelcancelsuccess';
    protected $rejectedmsg = 'main.serviceproviderdetails.rejectedsuccess';
    protected $rejectedcancelmsg = 'main.serviceproviderdetails.rejectedcancelsuccess';
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceProviderDetails =  ServiceProviderDetails::findorfail($id);
        if ($serviceProviderDetails) {
            $serviceProviderDetails->delete($id);
            return Redirect::back()->with($this->success, trans($this->deletemsg));            
        }        
    }

    /**
     *  To approvel service provider details
     *  @return true
     */
    public function approvel($id) 
    {
        $serviceProviderDetails =  ServiceProviderDetails::findorfail($id);
        if ($serviceProviderDetails->status == "New") {
            $approvel =  DB::statement('UPDATE service_providers_details SET status="Approval" where id='.$id);
            return Redirect::back()->with($this->success, trans($this->approvelmsg));
        } else if ($serviceProviderDetails->status == "Rejected"){
            $approvel =  DB::statement('UPDATE service_providers_details SET status="Approval" where id='.$id);
            return Redirect::back()->with($this->success, trans($this->approvelcancelmsg));
        }
    }

    /**
     *  To approvel service provider details
     *  @return true
     */
    public function reject($id) 
    {
        $serviceProviderDetails =  ServiceProviderDetails::findorfail($id);
        if ($serviceProviderDetails->status == "New") {
            $approvel =  DB::statement('UPDATE service_providers_details SET status="Rejected" where id='.$id);
            return Redirect::back()->with($this->success, trans($this->rejectedmsg));
        } else if ($serviceProviderDetails->status == "Approval") {
            $approvel =  DB::statement('UPDATE service_providers_details SET status="Rejected" where id='.$id);
            return Redirect::back()->with($this->success, trans($this->rejectedcancelmsg));
        } 
    }
}
