<!--/*****************************************************************************
 Fichier : detailCommande
 Auteur : Claudio Cruz
 Fonctionnalité : View por afficher les details d'une commande.
*****************************************************************************/-->
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a> >>
            <a class="p-2 text-gray-400" href="/listerCommandes">Lister Commande</a> >>
            Detailler Commande
        </p>
    </x-slot>

    <div class="py-12 overflow-hidden">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Detailler commande') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 space-y-4">
                <div class="md:flex md:items-center">
                    <div class="md:w-2/3"></div>
                    <div class="md:w-1/3 flex">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="user" >
                        Numéro :
                        </label>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="qtt_beverage">
                            {{ $commande->no_facture }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-6 text-gray-900 space-y-4">
                <div class="md:flex md:items-center">
                    <div class="md:w-2/3"></div>
                    <div class="md:w-1/3 flex">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="user" >
                        Date :
                        </label>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                            {{ \Carbon\Carbon::parse($commande->date_transaction)->format('d-m-Y') }}
                        </label>
                    </div>
                </div>
            </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user" >
                Nom :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    {{ $commande->user->name }}
                </label>
            </div>

            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                    Telephone :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    {{ $commande->user->telephone }}
                </label>
            </div>

            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="situation">
                    Situation :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    {{ $commande->etat_transaction->nom }}
                </label>
            </div>
        </div>
        <table class="table-fixed bg-white">
            <thead class="bg-gray-700 text-white">
              <tr>
                <th class="w-1/2 px-4 py-2">Produit</th>
                <th class="w-1/4 px-4 py-2">Quantité</th>
                <th class="w-1/4 px-4 py-2">Valeur</th>
                <th class="w-1/4 px-4 py-2">Total</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $sousTotal = 0;
                    define("TVQ",0.09975);
                    define("TPS", 0.05);
                @endphp
                @foreach ($elements[0]->produit as $element)
                    <tr>
                        <td class="border px-4 py-2">{{ $element->nom }}</td>
                        <td class="border px-4 py-2">{{ $element->pivot->quantite }}</td>
                        <td class="border px-4 py-2">{{ $element->prix }}</td>
                        <td class="border px-4 py-2">{{ number_format(($element->pivot->quantite * $element->prix), 2, '.', '') }}</td>
                    </tr>
                    @php
                        $sousTotal += $element->pivot->quantite * $element->prix;
                    @endphp
                @endforeach
                @php
                    $tps = $sousTotal * TPS;
                    $tvq = $sousTotal * TVQ;
                @endphp
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">Sous total</td>
                    <td class="border px-4 py-2">{{ number_format($sousTotal, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">TPS</td>
                    <td class="border px-4 py-2">{{ number_format($tps, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">TVQ</td>
                    <td class="border px-4 py-2">{{ number_format($tvq, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">Total</td>
                    <td class="border px-4 py-2">{{ number_format(($sousTotal + $tvq + $tps), 2, '.', '') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="md:flex md:items-center my-5">

            <button class="md:w-1/3 mx-20 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                <a href="/listerCommandes">Retourner</a>
            </button>

            <button class="md:w-1/3 mx-20 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('editerCommande',['id'=>$commande->id_transaction])}}">Editer</a>
            </button>

            <button class="md:w-1/3 mx-20 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                <a href="/listerCommandes">Supprimer</a>
            </button>

        </div>

    </div>

</x-app-layout>
