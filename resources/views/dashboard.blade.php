{{-- /*****************************************************************************
 Fichier : dashboard
 Auteur : Amélie Fréchette
 Fonctionnalité : C'est la page d'acceuil. Elle affiche les liens qu,il y a dans
 le nav avec un description de ce que c'est.
*****************************************************************************/ --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenu {{ Auth::check() ? Auth::user()->name : "Utilisateur anonyme" }}
        </h2>
    </x-slot>
        <div class = "acc_view text-2xl">
                <a href="{{ route('gestionCommandes') }}"><span><p class = "flex flex-row mt-28">
                    <img src="{{ asset('img/commande.svg') }}" alt="acc_commande" class = "mr-12 img_accCommande">Gestion de commande</p></span>
                </a>

                    <a href="{{ route('gestionProduits') }}"><p class = "flex flex-row ml-28 mt-8">
                        Gestion du menu<img src="{{ asset('img/menu.png') }}" alt="acc_menu" class = "ml-36 img_accMenu"></p>
                    </a>

                <div class = "flex flex-row">
                    <a href="{{ route('gestionInventaire') }}"><p class = "flex flex-row mt-8">
                        <img src="{{ asset('img/inventaire.svg') }}" alt="acc_inventaire" class = "mr-12 img_accInventaire">Gestion de l'inventaire</p>
                    </a>
                </div>

                <?php
                /* $user = Auth::check()
                if ($user->roles()->where('role', 'like', 'Administrateur')->count() > 0){
                */?>

                <div class = "flex flex-row">
                    <a href="{{ route('indexUser') }}"><p class = "flex flex-row ml-28 mt-8">
                        Gestion des utilisateurs<img src="{{ asset('img/employes.svg') }}" alt="acc_employes" class = "ml-20 img_accEmployes"></p>
                    </a>
                </div>

                <div class = "flex flex-row">
                    <a href="{{ route('promotions') }}"><p class = "flex flex-row mt-8 mb-24">
                        <img src="{{ asset('img/promo.svg') }}" alt="acc_promo" class = "mr-12 img_accPromo">Gestion des promotions</p>
                    </a>
                </div>
    </div>
</x-app-layout>
