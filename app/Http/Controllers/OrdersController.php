<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandsRequest;
use App\Models\Commands;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class OrdersController extends Controller
{
    public function closeOrder($orderId) {
        // Logique de fermeture de commande ici
    
        // Redirection vers une page appropriée après la fermeture de la commande
        return redirect()->back()->with('success', 'La commande a été fermée avec succès.');
    }
    
    public function markAsRead($id)
    {
        $notification = Auth::guard('employee')->user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

    public function markAllAsRead()
    {
        Auth::guard('employee')->user()->unreadNotifications->markAsRead();
        
        return redirect()->back();
    }
    public function store(CommandsRequest $request)
    {
       
    if (empty($request->total_price) || is_null($request->total_price)) {
        // Return an error message or redirect the user back to the form
        return redirect()->back()->withErrors(['total_price' => 'Le champ total_price ne peut être vide.']);
    }

        // Création de la commande
        $commands = Commands::create($request->all());

        // Redirection ou affichage d'une vue appropriée
        return redirect()->route('admin.caisse')->with('success', 'Commande créée avec succès');
    }
    public function caisse()
   {
       $categories = Categorie::all();
       $produits = Produit::all();
       return view('admin.takeorder', compact('categories', 'produits'));
   }

    public function cuisine()
    {  $commandes = Commands::with('produits')->get();
        return view('admin.cuisiner', compact('commandes'));
    }
    

    public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        $cmds = Commands::all();
        foreach ($cmds as $command) {
            $command->randomId = Str::random(7);
        }
        return view('admin.ordres', compact('cmds'));
    }
}
