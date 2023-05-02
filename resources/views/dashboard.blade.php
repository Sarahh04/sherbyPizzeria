<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenu {{ Auth::check() ? Auth::user()->name : "Utilisateur anonyme" }}
        </h2>
    </x-slot>
    <div>
        <div>
            <a href="{{ route('dashboard') }}"><p>
                <img src="{{ asset('img/commande.svg') }}" alt="acc_commande" class = "img_commande">Gestion de commande</p>
            </a>
        </div>

        <div>
            <a href="{{ route('dashboard') }}"><p>
                <img src="{{ asset('img/menu.png') }}" alt="acc_menu" class = "img_menu">Gestion du menu</p>
            </a>
        </div>

        <div>
            <a href="{{ route('dashboard') }}"><p>
                <img src="{{ asset('img/inventaire.svg') }}" alt="acc_inventaire" class = "img_inventaire">Gestion de l'inventaire</p>
            </a>
        </div>

        <?php
        /* $user = Auth::check()
        if ($user->roles()->where('role', 'like', 'Administrateur')->count() > 0){
        */?>

        <div>
            <a href="{{ route('indexUser') }}"><p>
                <img src="{{ asset('img/employes.svg') }}" alt="acc_employes" class = "img_employes">Gestion des utilisateurs</p>
            </a>
        </div>

        <div>
            <a href="{{ route('promotions') }}"><p>
                <img src="{{ asset('img/promo.svg') }}" alt="acc_promo" class = "img_promo">Gestion des promotions</p>
            </a>
        </div>
    </div>
</x-app-layout>
