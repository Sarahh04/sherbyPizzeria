{{-- /*****************************************************************************
 Fichier : employes
 Auteur : Amélie Fréchette
 Fonctionnalité : Affiche une liste de tout les employer actif de la base de donnée.
*****************************************************************************/ --}}

<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline ml-52">
            {{ __('Gestion des employés') }}
        </h1>
        <a href="{{ route('newEmploye') }}">
            <img type="image" src="{{ asset('img/user_plus.svg') }}" alt="Ajouter une promotion" class = "img_addUser" />
        </a>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-row justify-center mt-8 mb-20">
                    <form id="filtrer">
                        <label for="filtre_emp" class = "mr-8 mt-2">Filtré : </label>
                        <input type="text" id ="filtreNom" name = "filtreEmp" class = "mr-8 rounded w-1/5" placeholder="Nom">
                        <input type="text" id ="filtreTel" name = "filtreEmp" class = "mr-8 rounded w-1/5" placeholder="Telephone">
                        <input type="text" id ="filtreCourriel" name = "filtreEmp" class = "mr-8 rounded w-1/5" placeholder="Courriel">
                        <span type="submit" id="submitFiltre">
                        <img type="image" src="{{ asset('img/filter.svg') }}" alt="trouver un employe" class = " mt-2 img_filtrePromo" />
                        </span>
                    </form>
                </div>

                <div class="border-b-4 border-solid border-gray-950 mb-12"></div>
                <div id="divRepere" >
                    @foreach ($users as $user)
                            <div  class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4">
                                <div class = "flex flex-row">
                                    <a href="{{ route('employe', ['id' => $user->id]) }}">
                                        <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = "mr-48 img_imgPromo" />
                                    </a>
                                     <div class=" mr-48">
                                        <p>Nom : {{ $user->name }}</p>
                                        <p>Courriel : {{ $user->email }}</p>
                                        <p>Téléphone : {{ $user->telephone }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('modificationEmploye', ['id' => $user->id]) }}">
                                    <img type="image" src="{{ asset('img/edit.svg') }}" alt="edit employe" class = "mt-8 mr-6 img_editPromo">
                                </a>
                                <div id="{{$user->id}}"  class="hidden">deleteEmploye</div>
                                <img id="open" type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver employe" class = "mt-6 img_desactivePromo">
                            </div>


                    @endforeach
                </div>

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
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">Erreur</div>
                                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                    <p>{{ Session::get('erreur') }}</p>
                            </div>
                        </div>
                    @endif --}}


            </div>
        </div>
    </x-app-layout>
