<?php
/*
------------------------------------------------------------------------------------------------
Project         : KRQ 1.0.0
Created By      : Vijay Felix Raj C
Created Date    : 19.07.2017
Purpose         : To handle Category validation
------------------------------------------------------------------------------------------------
*/
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderRequest extends FormRequest
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
        $rules['status'] = 'required';
        $rules['category_id'] = 'required';
        $rules['location_id'] = 'required';
        $rules['city'] = 'required';
        $rules['service_id'] = 'required';
        $rules['short_description'] = 'required';
        $rules['status_owner_manager'] = 'required';
        $rules['opening_hrs'] = 'required';
        $rules['closing_hrs'] = 'required';
        $rules['working_days'] = 'required';
        $rules['phone'] = 'required|max:20';
        $rules['logo'] = 'required';
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            break;
            case 'POST':
            {
                $rules['password'] = 'required|max:64';
                $rules['name_sp'] = 'required|unique:service_providers,name_sp';
                $rules['email'] = 'required|unique:service_providers,email';
            }
            case 'PUT':
            case 'PATCH':
            {
                /*if(FormRequest::segment(2)){
                    $rules['category_name'] = 'required|unique:categories,category_name,' . FormRequest::segment(2) . ',id';
                }*/
            }
            break;
        default:break;
        }
        return $rules;
    }
}
