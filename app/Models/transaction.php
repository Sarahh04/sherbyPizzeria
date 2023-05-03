<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'date_transaction'
    ];
}
