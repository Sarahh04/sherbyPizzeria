<?php
/*****************************************************************************
 Fichier : Mode_paiement
 Auteur : Amélie Fréchette
 Fonctionnalité : Classe d'association de produit et transaction.
*****************************************************************************/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode_paiement extends Model
{
    use HasFactory;
    protected $table = 'mode_paiements';
    protected $primaryKey = 'id_mode_paiement';
    public $timestamps = false;
}
