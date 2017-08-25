<?php
/*
------------------------------------------------------------------------------------------------
Project			: KRQ 1.0.0
Created By    	: Vijay Felix Raj C
Created Date  	: 15.05.2017
Purpose       	: To handle employees details
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Controllers;

use URL;
use Session;
use Redirect;
use App\User;
use App\Models\Employee;
use App\Helpers\KranHelper;
use Rafwell\Simplegrid\Grid;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\ServiceProvider;

class EmployeeController extends Controller
{
  protected $error = 'error';
  protected $success = 'success';
  protected $route = 'main.employee.index';
  protected $title = 'main.employee.title';
  protected $notfound = 'main.employee.notfound';
  protected $createmsg = 'main.employee.createsuccess';
  protected $updatemsg = 'main.employee.updatesuccess';
  protected $deletemsg = 'main.employee.deletesuccess';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // To get the records details from the table
        $Grid = new Grid(Employee::query(), 'Employee');
      
	  // To have header for the values
          $Grid->fields([
                  'id' => 'ID',
                  'birth_date'=>'Date of Birth',
                  'first_name'=>'First Name',
                  'last_name'=>'Last Name',
                  'gender'=>[
                      'label'=>'Gender',
                      'field'=>"case when gender = 'M' then 'Male' else 'Female' end"
                  ]
              ]);
            // To have actions for the records
              $Grid->action('Edit', URL::to('employee/edit/{id}'))
              ->action('Delete', URL::to('employee/destroy/{id}'), [
                  'confirm'=>'Do you with so continue?',
                  'method'=>'DELETE',
              ]);
              // Pass the values to the view page
              return view('employee/index', ['grid'=>$Grid]);
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
        return view('employee.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
      $input = $request->all();
      Employee::create($input);
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
        $data['employee'] = Employee::findorFail($id);
        return view('employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $input = $request->all();
        $employee  = Employee::findorFail($id);
        $employee->fill($input);
        $employee->save();
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
      $employee = Employee::findorFail($id);
      $employee->delete();
      return Redirect::route($this->route)->with($this->success, trans($this->deletemsg));
    }
}
