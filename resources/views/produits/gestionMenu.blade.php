<x-app-layout>
    <article class="main-container-menu">
        <section class="product-menu-container">
            <div class="navigation-menu">
                <ul>
                    <li>Regulier</li>
                    <li>Promotion</li>
                    <li>indisponible</li>
                </ul>
            </div>
            <table class="GeneratedTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $item)
                        <tr>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->prix }}</td>
                            <td>
                                <div class="logo">
                                    <a href="/inventaire/modif/{{ $item->id_produit }}" class="modif-produit">
                                        <img src="{{ asset('image/editer-icon.png') }}" alt="" srcset="">
                                    </a>
                                    <a href="/inventaire/del/{{ $item->id_produit }}" class="modif-produit">
                                        <img src="{{ asset('img/desactiver.svg') }}" alt="">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="product-form-container">
            <div class="container-button-modif">
                <button class="">
                    Nouvel objet
                </button>
            </div>
            <div class="form-hidden form-gestion">
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
                    r">
                    <input type="submit" class="add-int" value="Ajouter">
            </div>
            </form>
            </div>
        </section>
    </article>

</x-app-layout>
