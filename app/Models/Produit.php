<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $primaryKey = 'id_produit';
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'prix',
        'delais',
        'quantite',
        'promo_courante',
        'description',
        'id_categorie'
    ];
}

