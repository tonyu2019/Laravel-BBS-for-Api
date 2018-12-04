<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
        switch($this->method())
        {
            // CREATE
            case 'POST':
                // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|between:2,25',
                    'category_id' => 'required',
                    'body' => 'min:5'
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }

    }
}
