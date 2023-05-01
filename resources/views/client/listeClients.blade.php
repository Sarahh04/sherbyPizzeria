<x-app-layout>
    <div class = "flex flex-row w-full justify-center mt-24">
        <h1 class="font-bold text-3xl underline decoration-double ml-52">
            {{ __('Liste des clients') }}
        </h1>
        <a href="{{ route('ajouterClient') }}">
            <img type="image" src="{{ asset('img/user_plus.svg') }}" alt="Ajouter un client" class = "img_addUser" />
        </a>
    </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-row justify-center mt-8 mb-20">
                    <label for="filtre_emp" class = "mr-8 mt-2">Filtré : </label>
                    <input type="text" name = "filtre_emp_nom" class = "mr-8 rounded w-1/5" placeholder="Nom">
                    <input type="text" name = "filtre_emp_prenom" class = "mr-8 rounded w-1/5" placeholder="Prenom">
                    <select name="filtre_emp_actif" class="mr-8 rounded w-1/5">
                        <option value="actif">Actif</option>
                        <option value="noActif">Non actif</option>
                    </select>
                    <img type="image" src="{{ asset('img/filter.svg') }}" alt="trouver un employe" class = " mt-2 img_filtrePromo" />
                </div>

                <div class="border-b-4 border-solid border-gray-950 mb-12"></div>

                    <a  href="{{ route('detailClient')}}">
                        <div class="flex flex-row justify-center border-2 border-solid border-gray-950 mx-36 py-10 mb-4">
                            <div class="flex flex-row">
                                <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = "mr-48 img_imgPromo" />
                                <div class=" mr-48">
                                    <p>Nom : Sarah</p>
                                    <p>Courriel : sarah@gmail.com</p>
                                    <p>Téléphone : 819-123-9445</p>
                                </div>
                            </div>

                            <a href="{{ route('modifierClient') }}">
                                <img  type="image" src="{{ asset('img/edit.svg') }}" alt="edit employe" class = "mt-8 mr-6 img_editPromo">
                            </a>
                                <img id="open" type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver employe" class = "mt-6 img_desactivePromo">
                         </div>
                    </a>
            </div>
        </div>
    </x-app-layout>
<!--Modal de suppression -->
<div id="modal" class=" hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold">Confirmer la suppression </h1>
    <div class="py-5 border-t border-b border-gray-300">
        <p>Êtes vous sûr de vouloir supprimer le compte?</p>
    </div>
    <div class="flex flex row gap-4 justify-end">
        <button id="delete" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Supprimer</button>
        <button id="close" class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Fermer</button>
    </div>
</div>
