<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Corriger la numérotation
        $counter = 1;
        //Charger les données de la DB
        $clients = Client::all();
        return view('clients.index', compact('clients', 'counter'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Appel du formulaire d'ajout du client
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des champs de formulaire
        // Sachant que validate est inclu dans la classe Request
        $request->validate
        ([
            'prenom_client' => 'required',
            'nom_client' => 'required',
            'phone_client' => 'unique:clients,phone_client|max:13',
            'email_client' => 'unique:clients,email_client|max:50|email',
            'adresse_client' => 'required',
        ]);

        // 1: Ajout du client à la base de données
        // 1. 1: Appel de la classe Client étant égal à la classe définie dans Models.Client
        // On stocke le new Client dans une variable pour pas qu'on l'invoque à chaque élement de la Classe
        $client = new Client;

        // 1. 2: Compléter les élements contenus dans $request comme décrit sur la fonction store()
        // 1. 3: Comme Client est une classe, indexer chaque variable; préciser la valeur
        // Mais en décomposant aussi la variable $request qui est une classe de Request()
        $client->nom_client = $request->nom_client;
        $client->prenom_client = $request->prenom_client;
        $client->phone_client = $request->phone_client;
        $client->email_client = $request->email_client;
        $client->adresse_client = $request->adresse_client;
        // 1. 4: On précise l'action à faire, enregistrer le nouveau client $client = new Client
        $client->save();

        // 1. 5: Après l'enregistrement au aura besoin d'être rediriger sur une page pour pas avoir une page blanche
        // !! Ici on nous rediriger vers l'url localhost:post_choisi/clients
        return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Avant de récupérer le formulaire, récupérer d'abord des informations du client à l'$id choisi
        $client = Client::findOrfail($id);

        //Appeler le formulaire en tenant compte de l'id séléctionner
        return view('clients.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation pour éviter tout compromis
        $request->validate
        ([
            'prenom_client' => 'required',
            'nom_client' => 'required',
            'phone_client' => 'unique:clients,phone_client|max:13',
            'email_client' => 'unique:clients,email_client|max:50|email',
            'adresse_client' => 'required',
        ]);
        $client = Client::findOrfail($id);
        $client->nom_client = $request->get('nom_client');
        $client->prenom_client = $request->get('prenom_client');
        $client->phone_client = $request->get('phone_client');
        $client->email_client = $request->get('email_client');
        $client->adresse_client = $request->get('adresse_client');

        $client->save();

        // 1. 5: Après l'enregistrement au aura besoin d'être rediriger sur une page pour pas avoir une page blanche
        // !! Ici on nous rediriger vers l'url localhost:post_choisi/clients
        return redirect(route('clients.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Pour supprimer un élément on doit
        // 1: Localiser l'ID qu'on veut supprimer
        $client = Client::find($id);
        // 2: On le supprime
        $client->delete();
        return redirect()->route('clients.index')->with('Success', 'Client a été supprimer avec succes');
        // Attention:
        //           - Ici la variable $client est toujours égal à new Client
        //           - Un id supprimer ne peut plus être récuperer
        //              - Si tu supprime l'$id 1 donc, il y aura plus jamais d'$id 1
        //              Voire concept de $id autoincrement

    }
}
