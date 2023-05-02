<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
            <div class = "flex flex-row  justify-center mt-24">
                <h1 class="font-bold text-3xl underline">
                    {{ __('Information sur le client') }}
                </h1>
            </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                        <p class="mb-1">Nom: Diakité</p>
                        <p class="mb-1">Prénom: Sarah</p>
                        <p class="mb-1">Téléphone: 819-123-1234</p>
                        <p class="mb-1">Courriel: sarah@gmail.com</p>
                        <p class="mb-1">Adresse: 240 rue sherby</p>
                        <p class="mb-1">Adresse de facturation: 204 rue sherby </p>
                        <p class="mb-1">Carte de crédit: 4250 1223 0000 1111</p>
                        <p class="mb-1">Points: 360 pts </p>
                    </div>
                    <div class="flex flex-row justify-center gap-4 mt-5" >

                        <button type="submit" name="confirmTime" value="Confirmer" >
                            <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                Retour
                            </div>
                        </button>
                        <div>
                            <button type="submit" name="confirmTime" value="Confirmer" >
                                <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                    Modifier
                                </div>
                            </button>

                            <button type="submit" name="annuler" value="Annuler" >
                                <div class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">
                                    Supprimer
                                </div>
                            </button>
                        </div>

                    </div>

                </div>
        </div>
    </div>


</x-app-layout>
