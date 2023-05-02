<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-sp text-gray-900 leading-tight">
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >>
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/consulterCommande">Consulter Commande</a> >>
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/listerCommandes">Lister Commande</a> >>
            Detailler Commande
        </p>
    </x-slot>

    <div class="py-12 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 space-y-4">
                <div class="md:flex md:items-center">
                    <div class="md:w-2/3"></div>
                    <div class="md:w-1/3 flex">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="user" >
                        Numéro :
                        </label>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="qtt_beverage">
                            1234
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-6 text-gray-900 space-y-4">
                <div class="md:flex md:items-center">
                    <div class="md:w-2/3"></div>
                    <div class="md:w-1/3 flex">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0" for="user" >
                        Date :
                        </label>
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                            01-05-2023
                        </label>
                    </div>
                </div>
            </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user" >
                Nom :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    Nom du client
                </label>
            </div>

            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                    Telephone :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    819 123 4567
                </label>
            </div>

            <div class="md:w-1/3 flex">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="situation">
                    Situation :
                </label>
                <label class="block text-gray-500 md:text-right mb-1 md:mb-0 pr-4" for="qtt_beverage">
                    Active
                </label>
            </div>
        </div>
        <table class="table-fixed bg-white">
            <thead class="bg-gray-700 text-white">
              <tr>
                <th class="w-1/2 px-4 py-2">Produit</th>
                <th class="w-1/4 px-4 py-2">Quantité</th>
                <th class="w-1/4 px-4 py-2">Valeur</th>
                <th class="w-1/4 px-4 py-2">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border px-4 py-2">Pizza - tout granit - M</td>
                <td class="border px-4 py-2">2</td>
                <td class="border px-4 py-2">11.50</td>
                <td class="border px-4 py-2">23.00</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Coke</td>
                <td class="border px-4 py-2">2</td>
                <td class="border px-4 py-2">4.50</td>
                <td class="border px-4 py-2">9.00</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Jus d'orange</td>
                <td class="border px-4 py-2">1</td>
                <td class="border px-4 py-2">5.50</td>
                <td class="border px-4 py-2">5.50</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Tarte aux pommes</td>
                <td class="border px-4 py-2">1</td>
                <td class="border px-4 py-2">6.00</td>
                <td class="border px-4 py-2">6.00</td>
              </tr>
              <tr>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2">Sous total</td>
                <td class="border px-4 py-2">43.50</td>
              </tr>
              <tr>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2">TPS</td>
                <td class="border px-4 py-2">2.17</td>
              </tr>
              <tr>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2">TVQ</td>
                <td class="border px-4 py-2">4.24</td>
              </tr>
              <tr>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2"></td>
                <td class="border px-4 py-2">Total</td>
                <td class="border px-4 py-2">49.91</td>
              </tr>
            </tbody>
          </table>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3 md:items-end">
                <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                    <a href="/listerCommandes">Retourner</a>
                </button>

                <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    <a href="/editerCommande">Editer</a>
                </button>
            </div>
        </div>
        </div>
        </div>
    </div>
</x-app-layout>
