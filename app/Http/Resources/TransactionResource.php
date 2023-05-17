<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request):array
    {
        return [
            'id_user' => $this->id_user,
            'id_etat_transaction' => $this->id_etat_transaction,
            'id_mode_paiement' => $this->d_mode_paiement,
            'id_type_transaction' => $this->id_type_transaction,
            'no_facture' => $this->no_facture ,
            'date_transaction' => $this->date_transaction,
            'observation'=> $this->observation
        ];
    }
}
