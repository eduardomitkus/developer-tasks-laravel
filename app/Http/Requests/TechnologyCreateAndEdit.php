<?php

namespace DeveloperTasks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyCreateAndEdit extends FormRequest
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
            'name' => 'required|string|max:45|unique:technologies',
            'platform' => 'in:"Web","Desktop","Mobile","Games","Multiplataforma"',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'platform' => 'plataforma'
        ];
    }
}
