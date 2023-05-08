<?php
/*****************************************************************************
 Fichier : CategorieProduit
 Auteur : Hugo Pouliot
 Fonctionnalité : Classe Categories de Produits.
*****************************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategorieProduit extends Model
{
    use HasFactory;
    protected $table = 'categorie_produits';
    protected $primaryKey = 'id_categorie';
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'description'
    ];

}
