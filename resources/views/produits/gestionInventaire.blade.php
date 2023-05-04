<link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
<x-app-layout>
    <article class="search-main">
        <section class="search-container">
            <form action="{{ route('search') }}" method="POST" class="search-form">
                <input type="text" class="search-bar">
                <input type="submit" value="Search inventory" class="search-button">
            </form>
        </section>
    </article>
    <article class="main-container-menu">

        <section class="product-menu-container">
            <table class="GeneratedTable">
                <thead>
                    <tr>
                        <th class="data-inv">Nom</th>
                        <th class="data-inv">Qty</th>
                        <th class="data-inv">Utilisation</th>
                        <th class="data-inv">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $item)
                        <tr>
                            <td class="data-inv">{{ $item->nom }}</td>
                            <td class="data-inv">{{ $item->quantite }}</td>
                            <td class="data-inv"></td>
                            <td class="data-inv">
                                <div class="logo">
                                    <a href="produit/modif/{{ $item->id_produit }}">
                                        <img src="{{ asset('image/editer-icon.png') }}" alt="" srcset="">
                                    </a>
                                    <img id="open" src="{{ asset('img/desactiver.svg') }}" alt="">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="product-form-container">
            <div class=" form-gestion">
                <form action="{{ route('insertionInventaire') }}" method="post" class="form-ajout-int">
                    @csrf
                    <div>
                        <input type="text" name="nom" placeholder="nom">
                    </div>
                    <div>
                        <input type="text" name="qty" placeholder="qty">
                    </div>
                    <div>
                        <input type="text" name="utility" placeholder="utility">
                    </div>
                    <input type="submit" value="Ajouter" class="add-int">
                </form>
            </div>
        </section>
    </article>
</x-app-layout>
<style>
    table.GeneratedTable {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
        border-width: 2px;
        border-color: #ffcc00;
        border-style: solid;
        color: #000000;
        overflow: scroll;
    }
</style>
