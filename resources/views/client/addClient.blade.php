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
                    <form id="form" method="post" action="{{route('enregistrementClient')}}">
                        @csrf
                        <div class="mb-4 flex flex-row ">
                            <label class="block text-gray-700 text-sm mx-1 labelClient font-bold mb-2 " for="nom">
                            Nom:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" id="nom" type="text" placeholder="nom">
                        </div>
                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="prenom">
                            Prénom:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="prenom" id="prenom" type="text" placeholder="prénom">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="tel">
                            Téléphone:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tel" id="tel" type="text" placeholder="xxx-xxx-xxxx">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="courriel">
                            Courriel:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="courriel" id="courriel" type="text" placeholder="client@gmail.com">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="adresse">
                            Adresse:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="adresse"  id="adresse" type="text" placeholder="240 rue sherby">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="adresseFact">
                            Adresse de facturation:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="adresseFact" id="carteCredit" type="text" placeholder="240 rue sherby">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="points">
                            Points:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="points" id="points" type="text" placeholder="0">
                        </div>


                    <div class="flex flex-row justify-center gap-4 mt-5" >
                        <button type="submit" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Ajouter
                        </button>

                        <button class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Retour
                        </button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </x-app-layout>
