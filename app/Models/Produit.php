<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nom_produit',
        'description_produit',
        'prix',
        'date_fabrication_produit',
        'date_expiration_produit',
        'disponibilite',
        'image_produit',
    ];


}
