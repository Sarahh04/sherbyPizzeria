<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-gray-900 leading-tight">
            <a class="hover:bg-red-800 hover:text-white p-2 text-gray-400" href="/gestionCommandes">Gesiton de Commandes</a> >> Ajouter Commande
        </p>
    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mt-6">
        {{ __( 'Ajouter Commande' ) }}
    </h2>
    <div class="py-12 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 space-y-4">
                <form class="w-full max-w-m m-auto" method="get" action="/extraitCommande">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="user" >
                            Nom
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="user" type="text" name="user" placeholder="Nom du client">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="telephone">
                                Telephone
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="bg-white appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="telephone" type="text" name="telephone" placeholder="819 123 4567">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pizza">
                                Pizza
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <select class="md:w-1/2 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="pizza" name="pizza">
                                <option>Item 1</option>
                                <option>Item 2</option>
                                <option>Item 3</option>
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="prix">
                                    Qtt
                                </label>
                                <select class="md:w-1/3 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_pizza" name="qtt_pizza">
                                    @for ($i = 0; $i < 10; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="md:w-1/3 px-3 flex">
                                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="grid-password">
                                        Taille :
                                    </label><br />
                                    <div class="md:flex w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <input type="radio" id="type1" name="choix" value="question"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4 h-12" for="type1">
                                            P
                                        </label>
                                        <input type="radio" id="type2" name="choix" value="commentaire"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="type2">
                                            M
                                        </label>
                                        <input type="radio" id="type3" name="choix" value="commentaire"/>
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="type2">
                                            G
                                        </label>
                                    </div>
                                </div>
                                <a href="" class="md:w-1/3 m-auto p-4 text-gray-900 flex hover:bg-red-800">
                                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter commande" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="beverage">
                                Beverage
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <select class="md:w-1/2 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="beverage" name="beverage">
                                <option>Item 1</option>
                                <option>Item 2</option>
                                <option>Item 3</option>
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="beverage">
                                    Qtt
                                </label>
                                <select class="md:w-1/3block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_beverage" name="qtt_beverage">
                                    @for ($i = 0; $i < 10; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                <a href="" class="md:w-1/3 m-auto p-4 text-gray-900 flex hover:bg-red-800">
                                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter commande" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="dessert">
                                Dessert
                            </label>
                        </div>
                        <div class="md:w-2/3 flex">
                            <select class="md:w-1/2 block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="dessert" name="dessert">
                                <option>Item 1</option>
                                <option>Item 2</option>
                                <option>Item 3</option>
                            </select>
                            <div class="md:w-1/2 flex">
                                <label class="md:w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="dessert">
                                    Qtt
                                </label>
                                <select class="md:w-1/3block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white" id="qtt_dessert" name="qtt_dessert">
                                    @for ($i = 0; $i < 10; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                <a href="" class="md:w-1/3 m-auto p-4 text-gray-900 flex hover:bg-red-800">
                                    <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('image/ajouter-icon.png') }}" alt="ajouter commande" />
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="note">
                                Observation
                            </label>
                        </div>
                            <textarea class="md:w-2/3 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="note" name="note" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 md:items-end">
                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="reset">
                                <a href="/gestionCommandes">Retourner</a>
                            </button>

                            <button class="md:w-1/3 mx-10 shadow bg-red-800 hover:bg-stone-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                               Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
