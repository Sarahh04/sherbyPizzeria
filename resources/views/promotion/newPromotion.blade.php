<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline decoration-double">
            {{ __("Ajout d'une promotion") }}
        </h1>
    </div>

    <form method="post" id = "addPromo_form" {{-- action="{{ route('insertionPromotion') }}" --}}>
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class = "flex flex-row mb-8">
                    <label class="pr-24 w-max font-bold" for="promo-name">Nom de la promotion</label>
                    <input type="text" name="promo-name" id="promo-name" class="border rounded py-2 px-3 mb-4 w-9/12" placeholder="Entrez le nom de la promotion" />
                </div>

                <div class="flex mb-4">
                    <label for="choix_prod" class = "font-bold">Choissir les produits</label>
                    <select name="product-select" id="product-select" class="border rounded py-2 px-3 w-1/2 mr-4 ml-24">
                        <option value="">Choisir un produit</option>
                        {{-- @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach --}}
                    </select>
                    <button type="button" id="add-product-btn" class="flex flex-row mt-2">
                        <img type="image" src="{{ asset('img/plus.svg') }}" alt="ajout produit a la promotion" class = "img_plusProd" />
                        Ajouter ce produit
                    </button>
                </div>

                <div class = "bg-white border-2 border-solid border-gray-500 py-24 mr-48 ml-60 rounded"></div>

                <button type="button" id="supp-product-btn" class="flex flex-row mt-2 btn_sup">
                    <img type="image" src="{{ asset('img/minus.svg') }}" alt="supprimer les produit de la promotion" class = "mt-1 mr-1 img_moinProd" />
                    Supprimer la sélection
                </button>

                <div class = "flex flex-row mt-12">
                    <label class="font-bold mr-12" for="promo-reduction">Réduction de la promotion</label>
                        <input type="number" name="promo-reduction" class="border rounded py-2 px-3 w-1/4 mr-8" placeholder="Entrez la réduction" />
                        <div>
                            <div class="flex items-center">
                                <input type="radio" name="promo-type" id="promo-type-percent" value="percent" class="mr-2">
                                <label for="promo-type-percent">Pourcentage</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="promo-type" id="promo-type-dollar" value="dollar" class="mr-2">
                                <label for="promo-type-dollar">Dollar</label>
                            </div>
                        </div>
                </div>

                <div class = "flex flex-row mt-12">
                    <label class="font-bold pr-14" for="promo-condition">Condition de la promotion</label>
                    <select name="promo-condition" id="promo-condition" class="border rounded py-2 px-3 w-9/12 mb-4">
                        <option value="">Choisir une condition</option>
                        <option value="minimum-order-amount">Montant minimum de commande</option>
                        <option value="specific-products">Produits spécifiques</option>
                    </select>
                </div>

                <div class="form-group mt-12">
                    <label for="promotion_image" class="font-bold pr-20">Image de la promotion</label>
                    <input type="file" name="promotion_image" id="promotion_image" class="form-control-file">
                </div>

                <button type="submit" id = "addPromo_btnEnv">Ajouter la promotion</button>
            </div>
        </div>
    </form>
</x-app-layout>
