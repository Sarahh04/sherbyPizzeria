<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a>
            >>  Lister Commande
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div  href="">
                <div class="flex flex-row justify-content border-2 border-solid border-gray-950 mx-36 py-10 mb-4 bg-white">
                    <img type="image" class="block h-9 mx-9 my-5 w-auto fill-current text-gray-800" src="{{ asset('image/fichier-icone.png') }}" alt="fichier commande" />
                    <div class=" mr-98">
                        <p><span class="font-semibold text-lg">Commande :</span> 1234</p>
                        <p><span class="font-semibold text-lg">Date :</span> 2023-05-01</p>
                        <p><span class="font-semibold text-lg">Téléphone :</span> 819 123 4567</p>
                    </div>
                    <a href="/detaillerCommande" class="p-4 text-gray-900 flex hover:bg-red-800">
                        <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/lister-icon.png') }}" alt="detailler une comande" />
                    </a>
                    <a href="/editerCommande" class="p-4 text-gray-900 flex hover:bg-red-800">
                        <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/editer-icon.png') }}" alt="editer commande" />
                </a>
                <a href="/supprimerCommande" class="p-4 text-gray-900 flex hover:bg-red-800">
                    <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/supprimer-icon.png') }}" alt="supprimer un produit" />
                </a>
            </div>

{{--
            @foreach ($commandes as $commande)
                <a  href="{{ route('employe', ['id' => $commande->id]) }}">
                    <div class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4">
                        <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = "mr-48 img_imgPromo" />
                        <div class=" mr-48">
                            <p>Commande : {{ $commande->id_transaction }}</p>
                            <p>Date : {{ $commande->date_transaction }}</p>
                            <p>Téléphone : {{ $commande->id_user }}</p>
                        </div>
                        <img type="image" src="{{ asset('img/edit.svg') }}" alt="edit employe" class = "mt-8 mr-6 img_editPromo">
                        <img type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver employe" class = "mt-6 img_desactivePromo">
                    </div>
                </a>
            @endforeach --}}
                    {{--  @if (Session::has('succes'))
                         <div role="alert">
                        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">Succès</div>
                            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                                <p>{{ Session::get('succes') }}</p>
                        </div>
                    </div>

                    <div class="p-6 text-gray-900 space-y-4">
                        @foreach ($produits as $produit)
                            <div class = "flex flex-row items-center">
                                <p class="font-semibold text-lg">{{ $produit->produit }} -
                                <a class="font-normal text-base text-sky-700 underline" href="{{
                                route('produit', ['id' => $produit->id_produit]) }}">En savoir plus</a></p>

                                <form method="get" action="{{ route('modificationProduit') }}">
                                    @csrf
                                        <button type="submit" name="id_produit" value="{{ $produit->id_produit }}" class="w-5 mx-2">
                                        <img src="{{ asset('img/edit-icon.png') }}" alt="Modifier un produit" />
                                        </button>
                                </form>

                                <form method="post" action="{{ route('suppressionProduit') }}">
                                    @csrf
                                        <button type="submit" name="id_produit" value="{{ $produit->id_produit }}" class="w-5">
                                        <img type="image" src="{{ asset('img/delete-icon.png') }}" alt="Supprimer un produit" />
                                        </button>
                                </form>
                            </div>

                        @endforeach
                    </div>
                @elseif (Session::has('erreur'))
                    <div role="alert">
                        <div class="bg-red-800 text-white font-bold rounded-t px-4 py-2">Erreur</div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>{{ Session::get('erreur') }}</p>
                        </div>
                    </div>
                @endif --}}


        </div>
    </div>
</x-app-layout>
