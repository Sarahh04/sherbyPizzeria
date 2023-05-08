<!--/*****************************************************************************
 Fichier : listerCommande
 Auteur : Claudio Cruz
 Fonctionnalité : View por faire l'affichage de une liste de commandes.
*****************************************************************************/-->
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a>
            >>  Lister Commande
        </p>
    </x-slot>

    <div class="py-12">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Lister commandes') }}
        </h1>
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
            {{-- <pre>
                @php(print_r($commandes_utilisateur_connecte))
            </pre> --}}
            <div class="border-b-4 border-solid border-gray-950 mb-12"></div>
            @foreach ($commandes as $commande)

            <a  href="{{ route('detailCommande',['id'=>$commande->id_transaction])}}">
                <div class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4">
                    <div class="flex flex-row">
                        <img type="image" src="{{ asset('image/fichier-icone.png') }}" alt="image de l'employe" class = "mr-48 img_imgPromo" />
                        <div class=" mr-48">
                            <p><span class="font-semibold text-lg">Commande :</span> {{ $commande->no_facture }}</p>
                            <p><span class="font-semibold text-lg">Date :</span>  {{ \Carbon\Carbon::parse($commande->date_transaction)->format('d-m-Y') }}</p>
                            <p><span class="font-semibold text-lg">Téléphone :</span> {{ $commande->user->telephone }}</p>
                        </div>
                    </div>

                    <a href="{{ route('editerCommande', ['id' => $commande->id_transaction]) }}" >
                        <img  type="image" src="{{ asset('img/edit.svg') }}" alt="edit commande" class = "mt-8 mr-6 img_editPromo"></a>
                        <a href="{{ route('detailCommande', ['id' => $commande->id_transaction]) }}" ></a>
                        <div id="{{$commande->id_transaction}}"  class="hidden">deleteClient</div>
                        <img onclick="deleteElement()" id="open" type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver commande" class = "mt-6 img_desactivePromo"></a>
                </div>
            </a>

            @endforeach
            </div>


            <div class="flex flex-row justify-center mx-36 py-0 mb-2">
                <button class="md:w-1/5 mx-10 my-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                    <a href="/consulterCommande">Retourner</a>
                </button>
            </div>

        </div>
    </div>
</x-app-layout>
