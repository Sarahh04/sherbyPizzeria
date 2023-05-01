<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline">
            {{ __('Calcul des delais de ceuillette') }}
        </h1>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                <h6 class="font-bold underline mb-1">Commande no {{$noCommande}}</h6>
                <p class="mb-1">Articles de la commande</p>
                @foreach ($articles as $a)
                    <p class="mb-1">{{$a}}: 25 min</p>
                @endforeach
                <p class="mb-1">Délai de ceuillette standard: 30 min</p>
                <div class="flex flex-row justify-center ">
                    <p class="mb-1">Heure de ceuillette estimé: </p> <input type="time" min="10:00" class="w-15 mx-1" name="additonalTime" value = "19:40">
                </div>
                <div class="flex flex-row justify-center ">
                    <p class="mb-1">Heure la plus tardive: </p> <input type="time" min="10:00" class="w-15 mx-1" name="tardifTime" value = "20:00">
                </div>
            </div>
            <div class="flex flex-row justify-center gap-4 mt-5" >
                <button type="submit" name="confirmTime" value="Confirmer" >
                    <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                        Confirmer
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
