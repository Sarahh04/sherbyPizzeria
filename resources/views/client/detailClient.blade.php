<!--/*****************************************************************************
 Fichier : detailClient
 Auteur : Sarah Diakite
 Fonctionnalité : View por faire l'affichage de clients.
*****************************************************************************/-->
<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class = "flex flex-row  justify-center mt-24">
                <h1 class="font-bold text-3xl underline">
                    {{ __('Information sur le client') }}
                </h1>
            </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                        <p class="mb-1">Nom: {{$client->name}}</p>
                        <p class="mb-1">Téléphone: {{$client->telephone}}</p>
                        <p class="mb-1">Courriel: {{$client->email}}</p>
                        <p class="mb-1">Adresse: {{$client->adresse}}</p>
                        <p class="mb-1">Points: 360 pts </p>
                    </div>
                    <div class="flex flex-row justify-center gap-4 mt-5" >

                        <a href="{{route('consulterClient')}}">
                            <button type="button" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Retour
                            </button>
                        </a>
                        <div class="flex flex-row">
                            <a href="{{route('modifierClient',['id' => $client->id])}}">
                                <button type="submit" name="confirmTime" value="Confirmer" >
                                    <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                        Modifier
                                    </div>
                                </button>
                            </a>
                            <form method="post" action="{{route('supprimerLeClient')}}">
                                @csrf
                                <button type="submit" name="annuler" >
                                    <input type="hidden" value="{{ $client->id}}" name="id">
                                    <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                        Supprimer
                                    </div>
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
        </div>
    </div>


</x-app-layout>
