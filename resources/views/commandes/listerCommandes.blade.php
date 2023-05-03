<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a>
            >>  Lister Commande
        </p>
    </x-slot>

    <div class="py-12">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Lister commandes') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($commandes as $commande)
                <div  href="">
                    <div class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4 bg-white ">
                        <div class="mr-98 md:w-1/4 m-center">
                            <img type="image" class="block h-9 mx-9 my-5 w-auto fill-current text-gray-800" src="{{ asset('image/fichier-icone.png') }}" alt="fichier commande" />
                        </div>
                        <div class=" mr-98 md:w-2/4">
                            <p><span class="font-semibold text-lg">Commande :</span> {{ $commande->no_facture }}</p>
                            <p><span class="font-semibold text-lg">Date :</span> {{ $commande->date_transaction }}</p>
                            <p><span class="font-semibold text-lg">Téléphone :</span> {{ $commande->id_user }}</p>
                        </div>

                        <div class="mr-98 md:w-1/4"></div>
                        <div class=" mr-98 md:w-2/4" >
                            <div class=" mr-98 md:w-2/4 flex justify-content">
                                <form method="get" action="{{ route('detaillerCommande') }}">
                                    @csrf
                                    <button type="submit" name="id_transaction" value="{{ $commande->id_transaction }}" class="p-4 text-gray-900 flex">
                                        <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/lister-icon.png') }}" alt="detailler une comande" />
                                    </button>
                                </form>

                                <form method="get" action="{{ route('editerCommande') }}">
                                    @csrf
                                    <button type="submit" name="id_transaction" value="{{ $commande->id_transaction }}" class="p-4 text-gray-900 flex">
                                        <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('img/edit.svg') }}" alt="editer commande" />
                                    </button>
                                </form>

                                <form method="get" action="{{ route('detaillerCommande') }}">
                                    @csrf
                                    <button type="submit" name="id_transaction" value="{{ $commande->id_transaction }}" class="p-4 text-gray-900 flex">
                                        <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('img/desactiver.svg') }}" alt="supprimer un produit" />
                                    </button>
                                </form>
                            </div>
                    </div>
                </div>
            @endforeach
            <div class="flex flex-row justify-center mx-36 py-0 mb-2">
                <button class="md:w-1/5 mx-10 my-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                    <a href="/consulterCommande">Retourner</a>
                </button>
            </div>

        </div>
    </div>
</x-app-layout>
