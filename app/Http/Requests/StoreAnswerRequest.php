<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // authorize all user to complete the form
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // définition de tous les champs obligatoires
        return [
            'question1' => 'required|max:255',
            'question2' => 'required|max:255',
            'question3' => 'required|max:255',
            'question4' => 'required|max:255',
            'question5' => 'required|max:255',
            'email' => 'required|max:255|email:rfc',
        ];
    }

    /**
     * Default error messages on validaiton errors
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'question1.required' => 'Le champ "Première question" est obligatoire',
            'question2.required' => 'Le champ "Seconde question" est obligatoire',
            'question3.required' => 'Le champ "troisième question" est obligatoire',
            'question4.required' => 'Le champ "Quatrième question" est obligatoire',
            'question5.required' => 'Le champ "Cinquième question" est obligatoire',
            'email.required' => 'Le champ "Email" est obligatoire',
            'email.email' => 'Le champ "Email" doit respecter le formation d\'un email xxx@xxx.xxx',
        ];
    }
}
