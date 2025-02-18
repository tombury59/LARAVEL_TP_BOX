<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('Gestion des Locataires') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Actions Bar avec design amélioré -->
            <div class="mb-8 p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="flex flex-col sm:flex-row justify-between gap-4">
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('locataires.create') }}"
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Nouveau Locataire
                        </a>
                        <a href="{{ route('locataires.export-csv') }}"
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Exporter CSV
                        </a>
                    </div>
                    <form method="GET" action="{{ route('locataires.index') }}" class="flex w-full sm:w-auto">
                        <div class="relative flex-grow sm:flex-grow-0">
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Rechercher un locataire..."
                                   class="w-full sm:w-96 px-4 py-2.5 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                            <button type="submit"
                                    class="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-gray-900 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Alerts avec design amélioré -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg shadow-sm animate-fade-in-down">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg shadow-sm animate-fade-in-down">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Grille des locataires avec design amélioré -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($locataires as $locataire)
                            <div class="group relative bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 hover:border-blue-200">
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                                                {{ $locataire->nom }} {{ $locataire->prenom }}
                                            </h3>
                                            <p class="text-gray-500 text-sm mt-1">{{ $locataire->email }}</p>
                                        </div>
                                        <a href="{{ route('locataires.show', $locataire->id) }}"
                                           class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="space-y-3">
                                        <p class="flex items-center text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                            {{ $locataire->telephone }}
                                        </p>
                                        <p class="flex items-center text-gray-600 group-hover:text-gray-900 transition-colors duration-300">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $locataire->ville }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full p-8 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun locataire disponible</h3>
                                <p class="mt-2 text-gray-500">Commencez par ajouter votre premier locataire</p>
                                <a href="{{ route('locataires.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Ajouter un locataire
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination avec style amélioré -->
                    <div class="mt-8">
                        {{ $locataires->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.3s ease-out;
        }
    </style>
</x-app-layout>
