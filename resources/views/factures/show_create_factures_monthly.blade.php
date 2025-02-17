<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une Facture') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('factures.create_factures_monthly', $reservation->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="numero_facture" class="block text-sm font-medium text-gray-700">Numéro de Facture</label>
                        </div>
                        <div class="mb-4">
                            <label for="payement_date" class="block text-sm font-medium text-gray-700">Date de Paiement</label>
                            <input type="date" id="payement_date" name="payement_date" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="montant_facture" class="block text-sm font-medium text-gray-700">Montant</label>
                            <input type="number" step="0.01" id="montant_facture" name="montant_facture" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="periode_facture" class="block text-sm font-medium text-gray-700">Période</label>
                            <input disabled type="text" id="periode_facture" value="{{$nextPeriod}}" name="periode_facture" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" required>
                            <input type="hidden" id="period" value="{{$nextPeriod}}" name="period">
                        </div>
                        <input type="hidden" name="contrat_id" value="{{ $reservation->contrat->id }}">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Créer Facture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
