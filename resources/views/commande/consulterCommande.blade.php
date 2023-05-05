<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >> Consulter Commande
        </p>
    </x-slot>
    <div class="py-12 overflow-hidden">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Consulter commande') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 space-y-4">
                <form class="w-full max-w-sm m-auto" method="get" action="{{ route('listerCommandes') }}">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="produit" >
                            Commande
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="no_commande" type="text" name="no_commande" placeholder="Num commande">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                                Date début
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="dt_debut" type="text" name="dt_debut" placeholder="Date début">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="prix">
                                Date fin
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="dt_fin" type="text" name="dt_fin" placeholder="Date fin">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="prix">
                                Client
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="user" type="text" name="user" placeholder="Nom du client">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="prix">
                                Telephone
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="prix" type="text" name="prix" placeholder="819 123 4567">
                        </div>
                    </div>
                    <div class="md:flex md:items-end">
                        <div class="md:w-1/3">
                            <button class="shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/gestionCommandes">Retourner</a>
                            </button>
                        </div>

                        <div class="md:w-2/3">
                            <button class="shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                               Consulter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
