<x-app-layout>
    <div class = "flex justify-end mt-24">
        <h1 class="font-bold text-5xl mt-12">{{ $user->name }}</h1>
        <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = " img_imgEmploye ml-40" />
    </div>
    <div class = "flex justify-center ml-80">
        <a href="{{ route('modificationEmploye', ['id' => $user->id]) }}">
            <img type="image" src="{{ asset('img/edit.svg') }}" alt="edit employe" class = "mt-1 mr-6 img_editPromo">
        </a>
        <img type="image" src="{{ asset('img/desactiver.svg') }}" alt="desactiver employe" class = "img_desactivePromo">
    </div>

    <div class="ml-96 mb-2 p-6">
        <p class="font-normal"><span class="font-semibold mr-36"> Courriel :</span>
            {{ $user->email }}</p>
        <p class="font-normal"><span class="font-semibold span_tel"> Numero de téléphone :</span>
            {{ $user->telephone }}</p>
        <p class="font-normal"><span class="font-semibold mr-36">Adresse :</span>
        {{ $user->adresse }}</p>
        <p class="font-normal"><span class="font-semibold span_naissance">Date de naissance :</span>
        {{ $user->naissance }}</p>
    </div>

    <div class="ml-96 mb-2 p-6">
        <p class="font-normal"><span class="font-semibold mr-40"> Poste :</span>
            {{ $user->poste }}</p>
        <p class="font-normal"><span class="font-semibold span_embauche"> Date d'embauche :</span>
            {{ $user->date_embauche }}</p>
        <p class="font-normal"><span class="font-semibold span_role">Role :</span>
            {{ $user->role->nom }}</p>
        <p class="font-normal"><span class="font-semibold mr-12">Spécimen de chèque :</span>
            {{ $user->specimen_cheque }}</p>
    </div>

    <div class="ml-96 mb-2 p-6">
        <p class="font-normal"><span class="font-semibold"> Note au dossier :</span></p>

        <div class="ml-24 mb-2 p-6">
            <p>Aucune note au dossier</p>
        </div>
        <button type="submit" class="btnAddNote">Ajouté une note au dosier</button>
    </div>
</x-app-layout>
