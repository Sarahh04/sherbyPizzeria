<!--/*****************************************************************************
 Fichier : editerCommande
 Auteur : Claudio Cruz
 Fonctionnalité : View por faire des modifications dans une commande.
*****************************************************************************/-->
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a> >>
            <a class="p-2 text-gray-400" href="/listerCommandes">Lister Commande</a> >>
            Editer Commande
        </p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="font-bold text-center text-3xl underline decoration-double my-10">
            {{ __('Modifier commande') }}
        </h1>
        <div class="p-6 text-gray-900 flex flex-col space-y-4">
            <form class="w-full max-w-m m-auto" method="GET" action="/extraitCommande/{{ $commande->id_transaction}}"
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user" >
                        Nom
                        </label>
                    </div>
                    <div class="md:w-3/5">
                        <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="user" type="text" name="user" value="{{ $commande->user->name }}">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/5">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                            Telephone
                        </label>
                    </div>
                    <div class="md:w-3/5">
                        <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="telephone" type="text" name="telephone" value="{{ $commande->user->telephone }}">
                    </div>
                </div>
                <div class="mb-6">
                    @foreach ($elements as $element)
                        @foreach ($element->produit as $item)
                            @if ($item->id_categorie == 1)
                                @for ($i = 0; $i < $item->pivot->quantite; $i++)
                                    <div class="flex mb-6">
                                        <div class="md:w-1/5">
                                            <label class="block text-gray-500 font-bold md:text-right mb-1 my-3 md:mb-0 pr-4" for="pizza">
                                                Pizza
                                            </label>
                                        </div>
                                        <div class="md:w-3/5 flex h-11">
                                            <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="pizza" name="pizza">
                                                @foreach ($produits as $produit)
                                                    @if ($produit->id_categorie == 1)
                                                        @if ($produit->id_produit == $item->id_produit)
                                                            <option selected>{{ $produit->nom }}</option>
                                                        @else
                                                            <option value="{{ $element->id_produit}}">{{ $produit->nom }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="md:w-2/3 flex">
                                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right pr-4 my-auto" for="qtt_pizza">
                                                    Qtt
                                                </label>
                                                <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_pizza" name="qtt_pizza">
                                                    @for ($i = 0; $i < 10; $i++)
                                                        @if ($i == $item->pivot->quantite )
                                                            <option value="{{ $item->pivot->quantite }}" selected>{{ $i }}</option>
                                                        @else
                                                            <option value="{{ $i }}">{{$i}}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endif

                            @if ($item->id_categorie == 2 || $item->id_categorie == 3)
                            @for ($i = 0; $i < $item->pivot->quantite; $i++)
                                <div class="flex mb-6">
                                    <div class="md:w-1/5">
                                        <label class="block text-gray-500 font-bold md:text-right mb-1 my-3 md:mb-0 pr-4" for="beverage">
                                            Beverage
                                        </label>
                                    </div>
                                    <div class="md:w-3/5 flex h-11">
                                        <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="beverage" name="beverage">
                                            @foreach ($produits as $produit)
                                                @if ($produit->id_categorie == 2 || $produit->id_categorie == 3)
                                                    @if ($produit->id_produit == $item->id_produit)
                                                        <option selected>{{ $produit->nom }}</option>
                                                    @else
                                                        <option value="{{ $element->id_produit }}">{{ $produit->nom }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="md:w-2/3 flex">
                                            <label class="md:w-1/3 block text-gray-500 font-bold md:text-right pr-4 my-auto" for="qtt_beverage">
                                                Qtt
                                            </label>
                                            <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_beverage" name="qtt_beverage">
                                                @for ($i = 0; $i < 10; $i++)
                                                    @if ($i == $item->pivot->quantite )
                                                        <option value="{{ $element->id_produit }}" selected>{{ $i }}</option>
                                                    @else
                                                        <option value="{{ $i }}">{{$i}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @endif

                            @if ($item->id_categorie == 4)
                                @for ($i = 0; $i < $item->pivot->quantite; $i++)
                                    <div class="flex">
                                        <div class="md:w-1/5">
                                            <label class="block text-gray-500 font-bold md:text-right mb-1 my-3 md:mb-0 pr-4" for="dessert">
                                                Dessert
                                            </label>
                                        </div>
                                        <div class="md:w-3/5 flex h-11">
                                            <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="dessert" name="dessert">
                                                @foreach ($produits as $produit)
                                                    @if ($produit->id_categorie == 4)
                                                        @if ($produit->id_produit == $item->id_produit)
                                                            <option selected>{{ $produit->nom }}</option>
                                                        @else
                                                            <option value="{{ $element->id_produit }}">{{ $produit->nom }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="md:w-2/3 flex">
                                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right pr-4 my-auto" for="qtt_dessert">
                                                    Qtt
                                                </label>
                                                <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_dessert" name="qtt_dessert">
                                                    @for ($i = 0; $i < 10; $i++)
                                                        @if ($i == $item->pivot->quantite )
                                                            <option value="{{ $element->id_produit }}" selected>{{ $i }}</option>
                                                        @else
                                                            <option value="{{ $i }}">{{$i}}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            @endif

                        @endforeach
                    @endforeach
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 md:items-end">
                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/gestionCommandes">Retourner</a>
                            </button>

                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" id="commande">
                                Modifier
                            </button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</x-app-layout>
