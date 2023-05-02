
<x-app-layout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation') }}
        </h2>
        <div class="p-6 text-gray-900 space-y-4">
            <p class="font-semibold mb-6">Employé(e) ajouté</p>
            <p class = "mb-6">Nom : <span class="font-semibold"><?php echo $user->name;?></span></p>
            <p>Courriel : <span class="font-semibold"><?php echo $user->email;?></span></p>
            <p>Le mot de passe à été mit par défaut veuiller demander à l'employé(e) de la changer à sa prochaine connexion.</p>
        </div>
</x-app-layout>
