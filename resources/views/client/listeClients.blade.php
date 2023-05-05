<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline ml-52">
            {{ __('Liste des clients') }}
        </h1>
        <a href="{{ route('ajouterClient') }}">
            <img type="image" src="{{ asset('img/user_plus.svg') }}" alt="Ajouter un client" class = "img_addUser" />
        </a>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-row justify-center mt-8 mb-20">
                    <form id="filtrer">
                        <label for="filtre_emp" class = "mr-8 mt-2">Filtré : </label>
                        <input type="text" id ="filtreNom" name = "filtreClient" class = "mr-8 rounded w-1/5" placeholder="Nom">
                        <input type="text" id ="filtreTel" name = "filtreClient" class = "mr-8 rounded w-1/5" placeholder="Telephone">
                        <input type="text" id ="filtreCourriel" name = "filtreClient" class = "mr-8 rounded w-1/5" placeholder="Courriel">
                        <span type="submit" id="submitFiltre">
                            <img type="image" src="{{ asset('img/filter.svg') }}" alt="trouver un employe" class = " mt-2 img_filtrePromo" />
                        </span>
                    </form>
                </div>

                <div class="border-b-4 border-solid border-gray-950 mb-12"></div>
                <div id="divRepere" >
                    @foreach ($clients as $client)
                        <div class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4">
                            <div class="flex flex-row">
                                <a  href="{{ route('detailClient',['id'=>$client->id])}}">
                                    <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = "mr-48 img_imgPromo" />
                                </a>
                                <div class=" mr-48">
                                    <p>Nom : {{$client->name}}</p>
                                    <p>Courriel : {{$client->email}}</p>
                                    <p>Téléphone : {{$client->telephone}}</p>
                                </div>
                            </div>

                            <a href="{{ route('modifierClient', ['id' => $client->id]) }}">
                                <img  type="image" src="{{ asset('img/edit.svg') }}" alt="edit employe" class = "mt-8 mr-6 img_editPromo">
                            </a>
                                <div id="{{$client->id}}"  class="hidden">deleteClient</div>
                                <img id="open" type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver employe" class = "mt-6 img_desactivePromo">
                         </div>
                @endforeach
            </div>
        </div>
    </x-app-layout>
