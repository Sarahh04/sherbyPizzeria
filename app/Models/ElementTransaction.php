<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementTransaction extends Model
{
    use HasFactory;
    protected $table = 'element_transactions';
    protected $primaryKey = 'id_elem_trans';
    public $timestamps = false;
}
