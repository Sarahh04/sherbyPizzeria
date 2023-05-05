<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitTransaction extends Pivot
{
    use HasFactory;

    protected $table = 'produit_transactions';
    protected $primaryKey = 'id_produit_transaction';
    public $incrementing = true;
    public $timestamps = false;
}
