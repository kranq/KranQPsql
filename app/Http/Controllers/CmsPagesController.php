<?php
/*
  ------------------------------------------------------------------------------------------------
  Project           : KRQ 1.0.0
  Created By        : Joseph
  Created Date      : 26.07.2017
  Purpose           : To handle CMS Page details
  ------------------------------------------------------------------------------------------------
 */
namespace App\Http\Controllers;

use URL;
use Redirect;
use App\Models\CmsPages;
use App\Helpers\KranHelper;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;
use Illuminate\Support\ServiceProvider;


class CmsPagesController extends Controller
{
	protected $error = 'error';
    protected $success = 'success';
    protected $route = 'main.cms.index';
    protected $title = 'main.cms.title';
    protected $notfound = 'main.cms.notfound';
    protected $createmsg = 'main.cms.createsuccess';
    protected $updatemsg = 'main.cms.updatesuccess';
    protected $deletemsg = 'main.cms.deletesuccess';
    protected $referencemsg = 'main.referencesuccess';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To get the records details from the table
        $Grid = new Grid(CmsPages::query(), 'CmsPages');

        // To have header for the values
        $Grid->fields([
            //'id' => 'ID',
            'title'=>'Title',
            'slug'=>'Slug',
            //'description'=>'Description',
        ])
        ->actionFields([
            'id' //The fields used for process actions. those not are showed 
        ]);
        // To have actions for the records
        $Grid->action('View', URL::to('cms/show/{id}'), ['class'=>'fa fa-eye'])
        	 ->action('Edit', URL::to('cms/edit/{id}'), ['class'=>'fa fa-edit']);
            /*->action('Delete', URL::to('city/destroy/{id}'), [
            'confirm'=>'Do you with so continue?',
            'method'=>'DELETE',
        ]);*/
        // Pass the values to the view page
        return view('cms/index', ['grid'=>$Grid]);
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
        $data['cms'] = CmsPages::findorFail($id);
        return view('cms.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cms'] = CmsPages::findorFail($id);
        $data['add'] = trans('main.edit');
        return view('cms.edit', $data);
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
        $input = $request->all();
        $cms  = CmsPages::findorFail($id);
        $cms->fill($input);
        $cms->save();
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
