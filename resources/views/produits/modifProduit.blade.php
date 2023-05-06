<x-app-layout>
    <article class="main-container-menu">
        <section class="product-form-container" style="flex-basis:100%;">
            <div class=" form-gestion">
                <form action="{{ route('modifierBdProduit') }}" method="POST">
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
