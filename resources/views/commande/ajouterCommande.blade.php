<!--/*****************************************************************************
 Fichier : ajouterCommande
 Auteur : Claudio Cruz
 Fonctionnalité : View por faire l'ajout d'un nouvel commande.
*****************************************************************************/-->
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >> Ajouter Commande
        </p>
    </x-slot>

    <div class="py-12 overflow-hidden">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Ajouter commande') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 flex flex-col space-y-4">
                <form class="w-full max-w-m m-auto">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="client" >
                            Nom
                            </label>
                        </div>
                        <div class="md:w-3/5">
                            <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="client" name="client">
                                @foreach ($users as $user)
                                    @php
                                        $telephone = $user->telephone;
                                        $client = $user->id;
                                        $dados = [$client,$telephone];
                                        $data = implode(",", $dados);
                                    @endphp
                                    <option value="{{ $client }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/5">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pizza">
                                    Mode de paiement
                                </label>
                            </div>
                            <select  class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="mPaiement" name="mPaiement">
                                @foreach ($modePaiements as $m)
                                    <option  value="{{ $m->id_mode_paiement}}">{{ $m->nom }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="md:flex md:items-center mb-6">

                        <div class="md:w-1/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pizza">
                                Pizza
                            </label>
                        </div>
                        <div class="md:w-4/5 flex h-11">
                            <select id="elementSelectionner" class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="pizza" name="pizza">
                                @foreach ($produits as $produit)
                                    @if ($produit->id_categorie == 1)
                                      <option  value="{{ $produit}}">{{ $produit->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/2 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4 my-5" for="prix">
                                    Qtt
                                </label>
                                <select id="selectQt" class="appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_pizza" name="qtt_pizza">
                                    @for ($i = 0; $i < $produit->quantite; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                {{-- <div class="md:w-2/3 px-3 flex my-5">
                                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="grid-password">
                                        Taille :
                                    </label><br />
                                    <div class="md:flex w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <input type="radio" id="type1" name="choix" value="question"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 h-12 ml-3" for="type1">
                                            P
                                        </label>
                                        <input type="radio" id="type2" name="choix" value="commentaire"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 ml-3" for="type2">
                                            M
                                        </label>
                                        <input type="radio" id="type3" name="choix" value="commentaire"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 ml-3" for="type2">
                                            G
                                        </label>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pizza">
                                Boisson
                            </label>
                        </div>
                        <div class="md:w-4/5 flex h-11">
                            <select id="elementSelectionner" class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="boisson" name="boisson">
                                @foreach ($produits as $produit)
                                    @if ($produit->id_categorie == 2 || $produit->id_categorie == 3)
                                    <option  value="{{ $produit}}">{{ $produit->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/2 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4 my-5" for="prix">
                                    Qtt
                                </label>
                                <div class="md:w-4/5 flex h-11">
                                    <select id="selectQt" class="md:w-1/3block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_Boisson" name="qtt_Boisson">
                                        @for ($i = 0; $i < $produit->quantite; $i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <img id="ajouterElement"class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter beverage" >

                            </div>
                    </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="dessert">
                                Dessert
                            </label>
                        </div>
                        <div class="md:w-4/5 flex h-11">
                            <select id="elementSelectionner" class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="dessert" name="dessert">
                                @foreach ($produits as $produit)
                                    @if ($produit->id_categorie == 4)
                                        <option value="{{ $produit }}">{{ $produit->nom }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4 my-5" for="dessert">
                                    Qtt
                                </label>
                                <select id="selectQt" class="md:w-1/3block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_dessert" name="qtt_dessert">
                                    @for ($i = 0; $i < $produit->quantite; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                {{-- <form method="post" action="">
                                    @csrf
                                    <button type="submit" name="ajouter_produit" id="ajouter_dessert" class="p-4 text-gray-900 flex"> --}}
                                        <img id="ajouterElement" class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter dessert" id="ajouter_dessert" >
                                    {{-- </button>
                                </form> --}}
                            </div>

                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/5">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="note">
                                Commentaire
                            </label>
                        </div>
                            <textarea class="md:w-3/5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="note" name="note" rows="4"></textarea>
                    </div>

                    <div>
                        <h6>Panier</h6>
                        <div id="panier" class="flex flex-col border">

                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 md:items-end">
                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/gestionCommandes">Retourner</a>
                            </button>
                            {{-- <a href="/gestionCommandes">Retourner</a> --}}
                            <button onclick="ajouterCommande()" class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Ajouter
                                {{-- <a href="/extraitCommande">Ajouter</a> --}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
