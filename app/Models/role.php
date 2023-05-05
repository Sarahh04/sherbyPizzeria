<?php
/*****************************************************************************
 Fichier : role
 Auteur : Amélie Fréchette
 Fonctionnalité : Classe role des utilisateurs.
*****************************************************************************/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    public $timestamps = false;

}
