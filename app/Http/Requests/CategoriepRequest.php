<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoriepRequest extends FormRequest
{
    public function rules()
    {
        return [
            'Nom' => 'required|string|unique:categoriesp', // Assurez-vous que le nom de la catégorie est unique
            'photo'=> 'image',
            'Référence' => 'required|string|max:255', 
        ];
    }
}
