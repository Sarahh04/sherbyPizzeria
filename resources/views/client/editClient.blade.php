<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg grid justify-items-center">
            <div class="flex flex-row w-full justify-center mt-24">
                <h1 class="font-bold text-3xl underline">
                    {{ __('Modifier le client') }}
                </h1>
            </div>

            <div class="py-12">
                <div class="mx-auto sm:px-6 lg:px-8">
                    <form id="form" method="post" action="{{route('updateClient')}}">
                        @csrf
                        <input class="hidden" name="idClient" id="idClient" type="text" value="{{$client->id}}">
                        <div class="mb-4 flex flex-row ">
                            <label class="block text-gray-700 text-sm mx-1 labelClient font-bold mb-2 " for="nom">
                                Nom:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nom" id="nom" type="text" value="{{$client->name}}">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="tel">
                                Téléphone:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tel" id="tel" type="text" value="{{$client->telephone}}">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="courriel">
                                Courriel:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="courriel" id="courriel" type="text" value="{{$client->email}}">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="adresse">
                                Adresse:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="adresse"  id="adresse" type="text" value="{{$client->adresse}}">
                        </div>

                        <div class="mb-4 flex flex-row">
                            <label class="block text-gray-700 text-sm mx-1 font-bold mb-2 labelClient " for="points">
                            Points:
                            </label>
                            <input class="shadow appearance-none border rounded inputWidth py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="points" id="points" type="text" placeholder="0">
                        </div>


                    <div class="flex flex-row justify-center gap-4 mt-5" >
                        <button type="submit" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Modifier
                        </button>
                        <a href="{{route('consulterClient')}}">
                            <button type="button" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Retour
                            </button>
                        </a>
                    </div>
                </form>

                </div>
            </div>
        </div>
</x-app-layout>
