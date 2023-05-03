<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitTransaction extends Model
{
    use HasFactory;
    protected $table = 'produit_transactions';
    protected $primaryKey = 'id_produit_transaction';
    public $timestamps = false;
}
