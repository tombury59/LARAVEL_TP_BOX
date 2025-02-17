<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-4">
                            @endif

                            <form method="GET" action="{{ route('factures.index') }}">
                                <label for="user" class="block text-sm font-medium text-gray-700">Sélectionner un utilisateur</label>
                                <select id="user" name="user" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ request('user') == $user->id ? 'selected' : '' }}>{{ $user->nom }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Filtrer</button>
                            </form>
                        </div>

                        @if($factures->isEmpty())
                            <p class="text-gray-600">Aucune facture trouvée.</p>
                        @else
                            <table class="min-w-full bg-white">
                                <thead>
                                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Numéro de Facture</th>
                                    <th class="py-3 px-6 text-left">Date de Paiement</th>
                                    <th class="py-3 px-6 text-left">Montant</th>
                                    <th class="py-3 px-6 text-left">Période</th>
                                    <th class="py-3 px-6 text-left">Contrat ID</th>
                                    <th class="py-3 px-6 text-left">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @foreach($factures as $facture)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">{{ $facture->numero_facture }}</td>
                                        <td class="py-3 px-6 text-left">{{ $facture->payement_date }}</td>
                                        <td class="py-3 px-6 text-left">{{ $facture->montant_facture }}</td>
                                        <td class="py-3 px-6 text-left">{{ $facture->period }}</td>
                                        <td class="py-3 px-6 text-left">{{ $facture->contrat_id }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <a href="{{ route('factures.show', $facture->id) }}" class="text-blue-600 hover:text-blue-900">Voir</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                </div>
            </div>
        </div>
</x-app-layout>
