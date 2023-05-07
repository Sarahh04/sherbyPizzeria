<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a>
            >>  Extrait Commande
        </p>
    </x-slot>
    <div class="py-12 overflow-hidden">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Extrait de la Commande') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 space-y-4">
                <form class="w-full max-w-m m-auto" method="get" action="/extraitCommande">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user" >
                            Nom :
                            </label>
                        </div>
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="user" >
                                Nome usuario
                            </label>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                                Telephone :
                            </label>
                        </div>
                        <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="user" >
                                Telephone usuario
                        </label>
                    </div>

                    @foreach ($users as $user)
                    <pre>
                        print_r($user);
                    </pre>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                {{-- {{ $produit->categorie->nom }} : --}}
                                Produit
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <label class="md:w-1/3 block text-gray-500 md:text-left mb-1 md:mb-0 pr-4" for="beverage">
                                {{-- {{ $produit->nom }} --}}
                                Nom produit
                            </label>
                            <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Quantité :
                            </label>
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                                {{-- {{ $produit->pivot->quantite }} --}}
                                1
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div class="md:flex md:items-center my-10">
                        <div class="md:w-1/3">
                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/consulterCommande">Retourner</a>
                            </button>
                        </div>
                        <div class="md:w-2/3 md:items-end">
                            <button class="md:w-1/3 mx-10 shadow bg-green-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                <a href="/gestionCommandes">Confirmer</a>
                            </button>

                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/gestionCommandes">Annuler</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
