<x-app-layout>
    <article class="main-container-menu">
        <section class="product-menu-container">
            <div class="navigation-menu">
                <ul>
                    <li>Regulier</li>
                    <li>Promotion</li>
                    <li>limiter</li>
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
                            <td><a href="produit/modif/{{ $item->id_produit }}">Modifier</a>
                                <img id="open" src="{{ asset('img/desactiver.svg') }}" alt="">
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
                <form action="">
                    <div class="nom-prix-container">
                        <div>
                            <input type="text" placeholder="Nom">
                        </div>
                        <div>
                            <input type="text" placeholder="prix">
                        </div>
                    </div>
                    <div class="description-container">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>
                    <div class="date-in-container">
                        <div>
                            <input type="date" placeholder="Expiration">
                        </div>
                        <div>
                            <select name="ingrediant" id="ingrediant">
                                <option default value="patate"></option>
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
