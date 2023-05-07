<?php
/*****************************************************************************
 Fichier : ClientRessource
 Auteur : Amélie Fréchette
 Fonctionnalité : permet d'envoyer sous format json les informations de
 l'utilisateur connecter à l'api
*****************************************************************************/

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'adresse' => $this->adresse,
            'naissance' => $this->naissance,
            'password' => $this->passeword,
            'poste' => $this->poste,
            'date_embauche' => $this->date_embauche,
            'specimen_cheque' => $this->specimen_cheque,
            'id_role' => $this->id_role
        ];
    }

}
