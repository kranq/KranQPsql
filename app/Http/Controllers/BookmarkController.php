<?php
/*
------------------------------------------------------------------------------------------------
Project       : KRQ
Created By    : Vijay Felix Raj C
Email Address : vijayfelixraj@gmail.com
Created Date  : 24.07.2017
Purpose       : To handle Bookmarks
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use URL;
use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Http\Request;
use Rafwell\Simplegrid\Grid;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // To get the records details from the table
        $Grid = new Grid(Bookmark::query(), 'bookmarks');

        // To have header for the values
        $Grid->fields([
              'id' => 'ID',
              'user_id'=>'User Name',
              'service_provider_id'=>'Service Provider',
              'bookmarked_on' => 'Bookmarked On'
        ]);
        
        // To have actions for the records
        $Grid->action('View', URL::to('bookmark/show/{id}'))
            ->action('Edit', URL::to('bookmark/edit/{id}'))
            ->action('Delete', URL::to('bookmark/destroy/{id}'), [
          'confirm'=>'Do you with so continue?',
          'method'=>'DELETE',
        ]);
        // Pass the values to the view page
        return view('bookmark.index', ['grid'=>$Grid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['add'] = trans('main.add');
        $data['users'] = User::orderBy('fullname', 'asc')->pluck('fullname', 'id');
        //echo '<pre>';print_r($data['users']);exit;
        return view('bookmark.form', $data);
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
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
