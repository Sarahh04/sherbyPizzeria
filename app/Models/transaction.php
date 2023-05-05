<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_etat_transaction',
        'id_mode_paiement',
        'id_type_transaction',
        'no_facture',
        'date_transaction',
        'observation'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function etat_transaction() : BelongsTo {
        return $this->BelongsTo(Etat_transaction::class, 'id_etat_transaction');
    }

    public function produit(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'produit_transactions', 'id_transaction', 'id_produit')->withPivot('quantite');
    }
}
