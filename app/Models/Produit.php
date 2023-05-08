<?php
/*****************************************************************************
 Fichier : Produit
 Auteur : Claudio Cruz
 Fonctionnalité : Classe de transaction produit
*****************************************************************************/
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\CategorieProduit;

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
        'id_categorie',
        'dispo'
    ];

    public function categorie(): BelongsTo
    {
        // Il faut préciser la classe (le modèle) avec laquelle la relation s’établit.
        return $this->belongsTo(CategorieProduit::class, 'id_categorie');
    }

    public function transaction(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'produit_transactions', 'id_transaction', 'id_produit')->withPivot('quantite');
    }
}
