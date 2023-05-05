<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_transaction extends Model
{
    use HasFactory;
    protected $table = 'etat_transactions';
    protected $primaryKey = 'id_etat_transaction';
    public $timestamps = false;
}
