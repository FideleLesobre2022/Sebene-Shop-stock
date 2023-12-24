<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'prenom_client',
        'nom_client',
        'email_client',
        'adresse_client',
        'phone_client'
    ];


}
