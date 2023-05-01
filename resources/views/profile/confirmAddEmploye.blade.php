
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <p class="font-semibold mb-6">Employé(e) ajouté</p>
                    <p class = "mb-6">Nom : <span class="font-semibold"><?php echo $user->name;?></span></p>
                    <p>Courriel : <span class="font-semibold"><?php echo $user->email;?></span></p>
                    <p>Le mot de passe à été mit par défaut veuiller demander à l'employé(e) de la changer à sa prochaine connexion.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
