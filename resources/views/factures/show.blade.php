<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la Facture') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- En-tête de la facture -->
                <div class="border-b border-gray-200">
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Facture #{{ $facture->numero_facture }}</h1>
                                <p class="text-gray-600 mt-1">ID: {{ $facture->id }}</p>
                            </div>
                            <div class="text-right">
                                <div class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 rounded-full">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Facture validée
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations principales -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Détails de la facture -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Détails de la facture</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Date de paiement</span>
                                    <span class="font-medium text-gray-900">{{ $facture->payement_date }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Période</span>
                                    <span class="font-medium text-gray-900">{{ $facture->period." ( ".$facture->periode_facture." )"}}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Contrat ID</span>
                                    <span class="font-medium text-gray-900">{{ $facture->contrat_id }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Montant et statut -->
                        <div class="bg-blue-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Montant</h3>
                            <div class="text-center">
                                <div class="text-4xl font-bold text-blue-600 mb-2">
                                    {{ number_format($facture->montant_facture, 2, ',', ' ') }} €
                                </div>
                                <span class="text-sm text-gray-600">Montant total TTC</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('factures.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour à la liste
                        </a>
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Télécharger la facture
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
