<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="hover:bg-red-500 hover:text-white p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="hover:bg-red-500 hover:text-white p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a> >>
            <a class="hover:bg-red-500 hover:text-white p-2 text-gray-400" href="/listerCommandes">Lister Commande</a> >>
            Supprimer Commande
        </p>
    </x-slot>

    <div class="py-12 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="/" class="m-auto p-4 text-gray-900 flex hover:bg-red-500">
                        <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter commande" />
                    <div class="ml-3.5 font-bold text-gray-800" >
                       {{ __("Ajouter Commande") }}
                    </div>
                </a>
                <div class="p-2"></div>
                <a href="/" class="p-4 text-gray-900 flex hover:bg-red-500">
                    <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/consulter-icon.png') }}" alt="Supprimer un produit" />
                    <div class="ml-3.5 font-bold text-gray-800 " >
                        {{ __("Consulter Commande") }}
                    </div>
                </a>
        </div>
    </div>
</x-app-layout>
