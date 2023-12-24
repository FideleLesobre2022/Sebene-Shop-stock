<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Corriger la numérotation
        $counter = 1;
        //Charger les données de la DB
        $employes = Employes::all();
        return view('employes.index', compact('employes', 'counter'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Appel du formulaire d'ajout du client
        return view('employes.create');
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
            'prenom_employe' => 'required',
            'nom_employe' => 'required',
            'adresse_employe' => 'required',
            'codepostal_employe' => 'required',
            'telephone_employe' => 'required|unique:employes,telephone_employe|max:13',
            'ville_employe' => 'required',
            'poste_employe' => 'required',
            'salaire_employe' => 'required',
        ]);
        // 1: Ajout du TRAVAILLEUR à la base de données
        // 1. 1: Appel de la classe Client étant égal à la classe définie dans Models.Client
        // On stocke le new Client dans une variable pour pas qu'on l'invoque à chaque élement de la Classe
        $employes = new Employes;

        // 1. 2: Compléter les élements contenus dans $request comme décrit sur la fonction store()
        // 1. 3: Comme Client est une classe, indexer chaque variable; préciser la valeur
        // Mais en décomposant aussi la variable $request qui est une classe de Request()
        $employes->nom_employe = $request->nom_employe;
        $employes->prenom_employe = $request->prenom_employe;
        $employes->adresse_employe = $request->adresse_employe;
        $employes->codepostal_employe = $request->codepostal_employe;
        $employes->telephone_employe = $request->telephone_employe;
        $employes->ville_employe = $request->ville_employe;
        $employes->poste_employe = $request->poste_employe;
        $employes->salaire_employe = $request->salaire_employe;
        // 1. 4: On précise l'action à faire, enregistrer le nouveau client $client = new Client
        $employes->save();

        // 1. 5: Après l'enregistrement au aura besoin d'être rediriger sur une page pour pas avoir une page blanche
        // !! Ici on nous rediriger vers l'url localhost:post_choisi/clients
        return redirect(route('employes.index'));
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
        $employes = Employes::findOrfail($id);

        //Appeler le formulaire en tenant compte de l'id séléctionner
        return view('employes.edit', compact('employes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation pour éviter tout compromis
        $request->validate
        ([
            'prenom_employe' => 'required',
            'nom_employe' => 'required',
            'adresse_employe' => 'required',
            'codepostal_employe' => 'required',
            'telephone_employe' => 'required|unique:employes,telephone_employe|max:13',
            'ville_employe' => 'required',
            'poste_employe' => 'required',
            'salaire_employe' => 'required',
        ]);
        $employes = Employes::findOrfail($id);
        $employes->nom_employe = $request->get('nom_employe');
        $employes->prenom_employe = $request->get('prenom_employe');
        $employes->adresse_employe = $request->get('adresse_employe');
        $employes->codepostal_employe = $request->get('codepostal_employe');
        $employes->telephone_employe = $request->get('telephone_employe');
        $employes->ville_employe = $request->get('ville_employe');
        $employes->poste_employe = $request->get('poste_employe');
        $employes->salaire_employe = $request->get('salaire_employe');

        $employes->save();

        // 1. 5: Après l'enregistrement au aura besoin d'être rediriger sur une page pour pas avoir une page blanche
        // !! Ici on nous rediriger vers l'url localhost:post_choisi/clients
        return redirect(route('employes.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Pour supprimer un élément on doit
        // 1: Localiser l'ID qu'on veut supprimer
        $employes = Employes::find($id);
        // 2: On le supprime
        $employes->delete();
        return redirect()->route('employes.index')->with('Success', 'Employé a été supprimer avec succes');
        // Attention:
        //           - Ici la variable $employes est toujours égal à new Client
        //           - Un id supprimer ne peut plus être récuperer
        //              - Si tu supprime l'$id 1 donc, il y aura plus jamais d'$id 1
        //              Voire concept de $id autoincrement
    }
}
