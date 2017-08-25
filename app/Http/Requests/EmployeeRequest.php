<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          switch ($this->method()) {
             case 'GET':
             case 'DELETE':
                 {
                     return [];
                 }
                 break;
             case 'POST':
                 {
                   $rules['emp_no'] = 'required|emp_no|unique:employee,emp_no';
                   $rules['first_name'] = 'required';
                   $rules['last_name'] = 'required';
                 }
             case 'PUT':
             case 'PATCH':
                 {
                   $rules['emp_no'] = 'required';
                   $rules['first_name'] = 'required';
                   $rules['last_name'] = 'required';
                 }
                 break;
             default:break;
         }
         return $rules;
    }
}
