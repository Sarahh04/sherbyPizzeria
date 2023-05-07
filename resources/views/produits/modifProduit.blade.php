<x-app-layout>
    <article class="main-container-menu">
        <section class="product-form-container" style="flex-basis:100%;">
            <div class=" form-gestion">
                <form action="{{ route('modifierBdProduit') }}" method="POST">
                    @csrf
                    <div class="nom-prix-container">
                        <div>
                            <input type="text" name="nom" placeholder="Nom" value="{{ $produits->nom }}">
                        </div>
                        <div>
                            <input type="text" name="prix" placeholder="prix" value="{{ $produits->prix }}">
                        </div>
                    </div>
                    <div class="description-container">
                        <div>
                            <input type="text" name="description" cols="30" rows="10"
                                placeholder="Description" value="{{ $produits->description }}"></textarea>
                        </div>

                    </div>
                    <div class="date-in-container">
                        <div>
                            <input type="text" placeholder="delais" name="delais" value="{{ $produits->delais }}">
                        </div>
                        <div>
                            <input type="text" placeholder="qty" name="qty" value="{{ $produits->quantite }}">
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
                        <input type="submit" class="add-int" value="Modifier">
                        <input type="hidden" name="id" value="{{ $id }}">
                    </div>
                </form>
            </div>
        </section>
    </article>
</x-app-layout>
