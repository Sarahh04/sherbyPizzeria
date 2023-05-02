<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note_dossier extends Model
{
    use HasFactory;

    protected $table = 'notes_dossiers';
    protected $primaryKey = 'id_note_dossier';
    public $timestamps = false;
}
