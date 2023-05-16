<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nom' => $this->nom,
            'prix' => $cthis->prix,
            'delais' => $this->delais,
            'quantite' => $cthis->quantite,
            'promo_courante' => $this->promo_courante,
            'description' => $this->description,
            'id_categorie' => $this->id_categorie,
            'dispo' => $this->dispo,
            'vedette' => $this->vedette,
            'temps_indispo' => null
        ];
    }
}
