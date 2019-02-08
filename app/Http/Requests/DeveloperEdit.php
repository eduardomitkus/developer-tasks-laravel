<?php

namespace DeveloperTasks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperEdit extends FormRequest
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
        return [            

            'name' => 'required|string|max:45',
            'nick_name' => 'required|string|max:45',
            'email' => 'required|string|email|max:100|unique:developers,email,'.auth()->user()->getId(),            
            'birth_date' => 'required|date_format:Y-m-d'
        ];
    }
    
    public function attributes()
    {
        return [
            'name' => 'nome',
            'nick_name' => 'nick',
            'birth_date' => 'data de aniversário'
        ];
    }
}
