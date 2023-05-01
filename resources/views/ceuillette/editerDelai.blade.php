<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline">
            {{ __('Modifier le delai de ceuillette') }}
        </h1>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                <h6 class="font-bold underline mb-1">Commande no {{$noCommande}}</h6>
                <p class="mb-1">Heure la plus tardive estimée: {{$heureTardive}}
                <div class="flex flex-row justify-center ">
                    <p class="mb-1">Nouvelle heure: </p> <input type="time" min="10:00" class="w-13 mx-1" name="newTime">
                </div>
            </div>
            <div class="flex flex-row justify-center gap-4 mt-5" >
                <button type="submit" name="confirmTime" value="Confirmer" >
                    <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                        Modifier
                    </div>
                </button>

                <button type="submit" name="annuler" value="Annuler" >
                    <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                        Annuler
                    </div>
                </button>
            </div>

        </div>
    </x-app-layout>
