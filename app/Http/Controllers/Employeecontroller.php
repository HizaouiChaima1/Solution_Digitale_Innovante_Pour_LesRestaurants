<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Employe;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeRegistered;
use Illuminate\Support\Facades\Auth;
class EmployeeController extends Controller
{public function store(EmployeRequest $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'Nom' => 'required|string',
            'Email' => 'required|email|unique:employes,email',
            'numero_de_téléphone' => 'required|string',
            'Rôle' => 'required|string',
            'password' => 'required|string',
            'nomrestau' => 'required|string',
        ]);
    
        // Création de l'employé
        $employe = Employe::create([
            'Nom' => $request->input('Nom'),
            'Email' => $request->input('Email'),
            'numero_de_téléphone' => $request->input('numero_de_téléphone'),
            'Rôle' => $request->input('Rôle'),
            'password' => bcrypt($request->input('password')),
            'nomrestau' => $request->input('nomrestau'),
            'customerAddress1' => $request->input('customerAddress1'),
            'pays' => $request->input('pays'),
        ]);
    
        // Envoi de l'e-mail
        Mail::to($employe->Email)->send(new EmployeRegistered(
            $employe->Email,
            $request->input('password'), // Assurez-vous de ne pas envoyer le mot de passe haché
            $employe->Rôle
        ));
    
        // Retour ou redirection après l'enregistrement
        return back()->with('success', 'Employé enregistré et email envoyé.');
    }
    
    public function index()
    {
        $Employe = Employe::all();
        return view('admin.role', compact('Employe'));
    }

}