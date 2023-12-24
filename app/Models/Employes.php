<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'prenom_employe',
        'nom_employe',
        'adresse_employe',
        'codepostal_employe',
        'ville_employe',
        'telephone_employe',
        'poste_employe',
        'salaire_employe'
    ];
}
