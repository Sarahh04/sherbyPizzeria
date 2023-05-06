<x-app-layout>
    <article class="main-container-menu">
        <section class="product-form-container" style="flex-basis:100%;">
            <div class=" form-gestion">
                <form action="" method="get">
                    <input type="hidden" name="id" value="{{ $id }}">
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
                                @foreach ($produits as $item)
                                    <option default value="patate">{{ $item->nom }}</option>
                                @endforeach
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
