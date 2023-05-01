<x-app-layout>
    <form method="post" action="{{ route('enregistrementEmploye', ['id' => $user->id]) }}">
        @csrf

        <input type="hidden" name="id_produit" value="{{ $user->id }}"/>

        <div class = "flex justify-center mt-24">
            <input type = "text" name = "name" class="text-5xl mt-12 rounded-md" value="{{ $user->name }}">
            <img type="image" src="{{ asset('img/image.svg') }}" alt="image de l'employe" class = " img_imgEmploye ml-48" />
        </div>

        <div class="ml-96 mb-2 p-6">
            <p class="font-normal"><span class="font-semibold mr-36"> Courriel :</span>
                <input type="text" name = "email" class = "rounded-md" value = "{{ $user->email }}"></p>
            <p class="font-normal"><span class="font-semibold span_tel"> Numero de téléphone :</span>
                <input type="text" name = "telephone" class = "rounded-md" value = "{{ $user->telephone }}"></p>
            <p class="font-normal"><span class="font-semibold mr-36">Adresse :</span>
                <input type="text" name = "adresse" class = "rounded-md" value = "{{ $user->adresse }}"></p>
            <p class="font-normal"><span class="font-semibold span_naissance">Date de naissance :</span>
                <input type="text" name = "naissance" class = "rounded-md" value = "{{ $user->naissance }}"></p>
        </div>

        <div class="ml-96 mb-2 p-6">
            <p class="font-normal"><span class="font-semibold mr-40"> Poste :</span>
                <input type="text" name = "poste" class = "rounded-md" value = "{{ $user->poste }}"></p>
            <p class="font-normal"><span class="font-semibold span_embauche"> Date d'embauche :</span>
                <input type="text" name = "embauche" class = "rounded-md" value = "{{ $user->date_embauche }}"></p>

            <p class="font-normal"><span class="font-semibold span_role">Role :</span>
            <select name="role" id="role" class = "rounded-md">
                <option value="{{ $user->id_role }}">{{ $user->role->nom }}</option>
                @foreach ($roles as $role)
                    @if ($role->id_role != $user->id_role)
                        <option value="{{ $role->id_role }}">{{ $role->nom }}</option>
                    @endif
                @endforeach
            </select></p>
            <p class="font-normal"><span class="font-semibold mr-12">Spécimen de chèque :</span>
                <input type="text" name = "specimen" class = "rounded-md" value = "{{ $user->specimen_cheque }}"></p>
        </div>

        <div class="ml-96 mb-2 p-6">
            <p class="font-normal"><span class="font-semibold"> Note au dossier :</span></p>

            <div class="ml-24 mb-2 p-6">
                <p>Aucune note au dossier</p>
            </div>
        </div>

        <div>
            <button type="submit" id = "btnModif">Modifier l'employé(e)</button>
        </div>

    </form>
</x-app-layout>
