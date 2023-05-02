<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg grid justify-items-center">
            <div class = "flex flex-row w-full justify-center mt-24">
                <h1 class="font-bold text-3xl underline">
                    {{ __('Ajouter un client') }}
                </h1>
            </div>

            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <form id="form" method="post">
                        @csrf
                        <div class="mb-4 flex flex-row ">
                            <label class="block text-gray-700 text-sm mx-1 labelClient font-bold mb-2 " for="nom">
                            Nom:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="nom">
                        </div>
                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prenom">
                            Prénom:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="prénom">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="tel">
                            Téléphone:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="xxx-xxx-xxxx">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prénom">
                            Courriel:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="client@gmail.com">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prénom">
                            Adresse:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="240 rue sherby">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prénom">
                            Adresse de facturation:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="240 rue sherby">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prénom">
                            Carte de crédit:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="xxxx xxxx xxxx xxxx">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prénom">
                            Points:
                            </label>
                            <input class="shadow appearance-none border rounded w-12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="0">
                        </div>

                    </form>
                    <div class="flex flex-row justify-center gap-4 mt-5" >
                        <button  class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Ajouter

                        </button>

                        <button class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Retour
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </x-app-layout>
