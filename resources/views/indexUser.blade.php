<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg grid justify-items-center justify-self-center">
            <div class = "flex flex-row w-full justify-center mt-24">
                <h1 class="font-bold text-3xl underline">
                    {{ __('Liste des utilisateurs') }}
                </h1>
            </div>

            <div class="flex flex-col justify-center gap-4 mt-5" >
                <a href="{{ route('consulterClient')}}">
                    <button  class="py-6 px-40 text-2xl text-white bg-rouge rounded border border-solid border-black">
                        Voir clients
                    </button>

                </a>
                <a href="{{ route('employes')}}">
                    <button class="py-6 px-36 mb-24 text-2xl text-white bg-rouge rounded border border-solid border-black">
                            Voir employés
                    </button>
                </a>
            </div>


        </div>
    </div>
    </x-app-layout>
