<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la Facture') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Facture #{{ $facture->numero_facture }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p><strong>ID:</strong> {{ $facture->id }}</p>
                            <p><strong>Numéro de Facture:</strong> {{ $facture->numero_facture }}</p>
                            <p><strong>Date de Paiement:</strong> {{ $facture->payement_date }}</p>
                        </div>
                        <div>
                            <p><strong>Montant:</strong> {{ $facture->montant_facture }}</p>
                            <p><strong>Période:</strong> {{ $facture->periode_facture }}</p>
                            <p><strong>Contrat ID:</strong> {{ $facture->contrat_id }}</p>
                        </div>
                    </div>
                    <a href="{{ route('factures.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
