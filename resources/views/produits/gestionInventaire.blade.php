<x-app-layout>
    <div id="modal"
        class=" hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
        <h1 class="text-2xl font-semibold">Confirmer la suppression </h1>
        <div class="py-5 border-t border-b border-gray-300">
            <p>Êtes vous sûr de vouloir supprimer le compte?</p>
        </div>
        <div class="flex flex row gap-4 justify-end">
            <button id="delete"
                class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Supprimer</button>
            <button id="close"
                class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Fermer</button>
        </div>
    </div>
    <article class="search-main">
        <section class="search-container">
            <form action="{{ route('search') }}" method="get" class="search-form">
                <input type="text" class="search-bar" name="nom">
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

                        <th class="data-inv">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $item)
                        <tr id="divRepere">
                            <td class="data-inv">{{ $item->nom }}</td>
                            <td class="data-inv">{{ $item->quantite }}</td>
                            <td class="data-inv">
                                <div class="logo">
                                    <a href="/inventaire/modif/{{ $item->id_produit }}">
                                        <img src="{{ asset('image/editer-icon.png') }}" alt="" srcset="">
                                    </a>
                                    <div id="{{ $item->id_produit }}" class="hidden">deleteProduit</div>
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
                <form action="{{ route('insertionInventaire') }}" method="POST">
                    @csrf
                    <div class="nom-prix-container">
                        <div>
                            <input type="text" name="nom" placeholder="Nom(required)">
                        </div>
                        <div>
                            <input type="text" name="prix" placeholder="prix">
                        </div>
                    </div>
                    <div class="description-container">
                        <div>
                            <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                        </div>

                    </div>
                    <div class="date-in-container">
                        <div>
                            <input type="text" placeholder="delais" name="delais">
                        </div>
                        <div>
                            <input type="text" placeholder="qty" name="qty(required)">
                        </div>
                    </div>
                    <div class="nom-prix-container">
                        <div>
                            <select name="categorie" id="">
                                @foreach ($categories as $element)
                                    <option value="{{ $element->id_categorie }}">{{ $element->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="dispo" id="">
                                <option value="disponible">Disponible</option>
                                <option value="indisponible">Indisponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="submit-container">
                        <input type="submit" class="add-int" value="Ajouter">
                    </div>
                </form>
            </div>
        </section>
    </article>
</x-app-layout>
<script src="{{ asset('js/script.js') }}"></script>
