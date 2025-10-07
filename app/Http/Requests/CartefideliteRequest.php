<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartefideliteRequest extends FormRequest
{
    public function rules()
{ 
    return [
        'Nom' => 'required|string', 
        'SKU' => 'required|string|max:255', 
        'strategie_prix'=>'string',
        'Prix' => 'required_if:strategie_prix,Prix fixe', 
        'code_barre'=>'string',
        'photo' => 'image|mimes:jpeg,png,gif|max:2048',
        'Catégorie' => 'required|string', 

    ];
   
}

}