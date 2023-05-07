<x-app-layout>
    <article class="main-container-menu">
        <section class="product-form-container" style="flex-basis:100%;">
            <div class=" form-gestion">
                <div class="  w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
                    <h1 class="text-2xl font-semibold">Confirmer la suppression </h1>
                    <div class="py-5 border-t border-b border-gray-300">
                        <p>Êtes vous sûr de vouloir supprimer le compte?</p>
                    </div>
                    <div class="flex flex row gap-4 justify-end">
                        <button id="delete"
                            class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black"><a
                                href="/supprimerProduit/{{ $id }}">Supprimer</a></button>
                    </div>
                </div>
        </section>
    </article>
</x-app-layout>
