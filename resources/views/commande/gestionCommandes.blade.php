<!--/*****************************************************************************
 Fichier : gestionCommande
 Auteur : Claudio Cruz
 Fonctionnalité : View de bien venue des fonctionalités de la commande.
*****************************************************************************/-->
<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            Gestion de Commandes
        </p>
    </x-slot>

    <div class="py-12 block overflow-hidden">
        <h1 class="font-bold text-center text-3xl underline decoration-double mb-20">
            {{ __('Gestion de commandes') }}
        </h1>
        <div class="max-w-7xl flex flex-col mx-auto sm:px-6 lg:px-8">
                <a href="/ajouterCommande" class="mx-auto p-4 text-gray-900 flex">
                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter commande" />
                    <div class="ml-3.5 m-auto font-bold text-gray-800 hover:text-white" >
                       {{ __("Ajouter la Commande") }}
                    </div>
                </a>
                <div class="p-2"></div>
                <a href="/consulterCommande" class="mx-auto p-4 text-gray-900 flex">
                    <img class="block h-9 w-auto fill-current text-gray-800" type="image" src="{{ asset('image/consulter-icon.png') }}" alt="Supprimer un produit" />
                    <div class="ml-3.5 m-auto font-bold text-gray-800 hover:text-white" >
                        {{ __("Consulter Commande") }}
                    </div>
                </a>
        </div>
    </div>
</x-app-layout>
