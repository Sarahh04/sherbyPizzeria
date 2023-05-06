<x-app-layout>
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
                        <tr>
                            <td class="data-inv">{{ $item->nom }}</td>
                            <td class="data-inv">{{ $item->quantite }}</td>
                            <td class="data-inv">
                                <div class="logo">
                                    <a href="/produit/modif">
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
                <form action="{{ route('insertionInventaire') }}" method="POST">
                    @csrf
                    <div class="nom-prix-container">
                        <div>
                            <input type="text" name="nom" placeholder="Nom">
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
                            <input type="text" placeholder="qty" name="qty">
                        </div>
                    </div>
                    <div class="description-container">
                        <select name="categorie" id="">
                            @foreach ($categories as $element)
                                <option value="{{ $element->id_categorie }}">{{ $element->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="submit-container">
                        <input type="submit" class="add-int" value="Ajouter">
                    </div>
                </form>
            </div>
        </section>
    </article>
</x-app-layout>
