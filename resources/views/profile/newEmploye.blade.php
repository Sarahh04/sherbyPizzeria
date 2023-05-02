
<x-app-layout>
    <h1 class="flex justify-center font-bold text-3xl underline decoration-double my-12">
        {{ __('Ajouter un employé(e)') }}
    </h1>
    <div class="mx-auto w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('insertEmploye') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nom')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Courriel')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="telephone" :value="__('Telephone')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required/>
            </div>

            <div class="mt-4">
                <x-input-label for="adresse" :value="__('Adresse')" />
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required/>
            </div>

            <div class="mt-4">
                <x-input-label for="naissance" :value="__('Naissance')" />
                <x-text-input id="naissance" class="block mt-1 w-full" type="date" name="naissance" :value="old('naissance')" required/>
            </div>

            <div class = "mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select name="role" id="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id_role }}">{{ $role->nom }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="poste" :value="__('Poste')" />
                <x-text-input id="poste" class="block mt-1 w-full" type="text" name="poste" :value="old('poste')" required/>
            </div>

            <div class="mt-4">
                <x-input-label for="embauche" :value="__('Date embauche')" />
                <x-text-input id="embauche" class="block mt-1 w-full" type="date" name="embauche" :value="old('date_embauche')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="specimen" :value="__('Specimen de chèque')" />
                <x-text-input id="specimen" class="block mt-1 w-full" type="file" name="specimen" :value="old('specimen_cheque')"/>
            </div>

            <div class="flex items-center justify-end mt-4">

                <button type = "submit" id = "addEmp_btnEnv" class="ml-4 px-8">
                    {{ __('Ajouter') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
