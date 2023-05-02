<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="hover:bg-red-500 hover:text-white p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="hover:bg-red-500 hover:text-white p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a>
            >>  Extrait Commande
        </p>
    </x-slot>
    <div class="py-12 overflow-hidden">
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
                                Nom du client
                            </label>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                                Telephone :
                            </label>
                        </div>
                        <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="user" >
                            819 123 4567
                        </label>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Pizza :
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="pizza">
                                Tout granit
                            </label>
                            <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Quantité
                            </label>
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_pizza">
                                1
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Berverage :
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="beverage">
                                Coca
                            </label>
                            <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Quantité
                            </label>
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                                1
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Beverage :
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="beverage">
                                Soda
                            </label>
                            <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Quantité
                            </label>
                            <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                                1
                            </label>
                        </div>

                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Total :
                        </label>
                        <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                            24.50
                        </label>
                    </div>
                    <div class="md:flex md:items-center">
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
