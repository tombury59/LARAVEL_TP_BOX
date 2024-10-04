<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du Locataire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-10">
                    <div class="flex flex-col md:flex-row">
                        <!-- Colonne de gauche : informations principales -->
                        <div class="md:w-1/3 pr-4">
                            <div class="bg-gradient-to-br from-blue-500 to-purple-600 text-black rounded-lg p-6 shadow-lg">
                                <h2 class="text-2xl font-bold mb-2 text-center">{{ $locataire->prenom }} {{ $locataire->nom }}</h2>
                                <p class="text-center text-blue-200 mb-4">{{ $locataire->email }}</p>
                                <div class="flex justify-center space-x-4 mb-4">
                                    <a href="mailto:{{ $locataire->email }}" class="bg-white text-blue-500 rounded-full p-2 hover:bg-blue-100 transition duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </a>
                                    <a href="tel:{{ $locataire->telephone }}" class="bg-white text-blue-500 rounded-full p-2 hover:bg-blue-100 transition duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne de droite : détails et historique -->
                        <div class="md:w-2/3 mt-6 md:mt-0">
                            <div class="bg-gray-100 rounded-lg p-6 shadow-md mb-6">
                                <h3 class="text-xl font-semibold mb-4 text-gray-700">Informations détaillées</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Adresse</p>
                                        <p class="font-medium">{{ $locataire->adresse }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Ville</p>
                                        <p class="font-medium">{{ $locataire->ville }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Code Postal</p>
                                        <p class="font-medium">{{ $locataire->code_postal }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Pays</p>
                                        <p class="font-medium">{{ $locataire->pays }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-100 rounded-lg p-6 shadow-md">
                                <h3 class="text-xl font-semibold mb-4 text-gray-700">Historique de location</h3>
                                <ul class="space-y-4">
{{--                                    @forelse($locataire->locations as $location)--}}
{{--                                        <li class="bg-white p-4 rounded-md shadow">--}}
{{--                                            <div class="flex justify-between items-center">--}}
{{--                                                <span class="font-medium text-blue-600">{{ $location->property_name }}</span>--}}
{{--                                                <span class="text-sm text-gray-500">{{ $location->start_date->format('d/m/Y') }} - {{ $location->end_date->format('d/m/Y') }}</span>--}}
{{--                                            </div>--}}
{{--                                            <p class="text-gray-600 mt-2">{{ $location->notes }}</p>--}}
{{--                                        </li>--}}
{{--                                    @empty--}}
{{--                                        <li class="text-gray-500 text-center">Aucun historique de location disponible.</li>--}}
{{--                                    @endforelse--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
