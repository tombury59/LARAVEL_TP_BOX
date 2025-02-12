<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Ajouter un Locataire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <form method="POST" action="{{ route('locataires.store') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nom -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="nom">
                                Nom
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="nom" name="nom" type="text" placeholder="Nom" required>
                        </div>
                        <!-- Prénom -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="prenom">
                                Prénom
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="prenom" name="prenom" type="text" placeholder="Prénom" required>
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="email">
                                Email
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="email" name="email" type="email" placeholder="Email" required>
                        </div>
                        <!-- Téléphone -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="telephone">
                                Téléphone
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="telephone" name="telephone" type="text" placeholder="Téléphone">
                        </div>
                        <!-- Adresse -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2" for="adresse">
                                Adresse
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="adresse" name="adresse" type="text" placeholder="Adresse">
                        </div>
                        <!-- Ville & Code Postal -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="ville">
                                Ville
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="ville" name="ville" type="text" placeholder="Ville">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="code_postal">
                                Code Postal
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="code_postal" name="code_postal" type="text" placeholder="Code Postal">
                        </div>
                        <!-- Pays -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="pays">
                                Pays
                            </label>
                            <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="pays" name="pays" type="text" placeholder="Pays">
                        </div>
                        <!-- Type de Paiement -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="type_paiement">
                                Type de Paiement
                            </label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="type_paiement" name="type_paiement">
                                @foreach($typepayements as $typepayement)
                                    <option value="{{ $typepayement->id }}">{{ $typepayement->type_payement }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
