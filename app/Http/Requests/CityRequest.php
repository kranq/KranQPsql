<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        $rules['city_code'] = 'required|max:3';
        $rules['status'] = 'required';
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
                break;
                case 'POST':
                {
                   $rules['city_name'] = 'required|unique:cities,city_name';
                }
                case 'PUT':
                case 'PATCH':
                {
                  if(FormRequest::segment(2)){
                    $rules['city_name'] = 'required|unique:cities,city_name,' . FormRequest::segment(2) . ',id';
                }
            }
            break;
            default:break;
        }
        return $rules;
    }
}
