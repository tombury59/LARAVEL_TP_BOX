<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Calcul des Régimes Fiscaux') }}
            </h2>
            <form method="GET" action="{{ route('impots.calculations') }}" class="flex items-center space-x-4">
                <select name="year" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Filtrer
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Résumé annuel -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Résumé Annuel {{ $selectedYear }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">Revenus Totaux</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($revenus, 2, ',', ' ') }} €</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">Moyenne Mensuelle</p>
                        <p class="text-2xl font-bold text-gray-900">{{ number_format($moyenneMensuelle, 2, ',', ' ') }} €</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600">Régime Conseillé</p>
                        <p class="text-2xl font-bold {{ $microFoncierEligible ? 'text-green-600' : 'text-blue-600' }}">
                            {{ $microFoncierEligible ? 'Micro-foncier' : 'Réel' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Détail par trimestre -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Détail par Trimestre</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">T{{ $i }}</p>
                            <p class="text-xl font-bold text-gray-900">
                                {{ number_format($revenusParTrimestre->get($i)->total ?? 0, 2, ',', ' ') }} €
                            </p>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Régime micro-foncier -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6 {{ $microFoncierEligible ? 'bg-green-50' : 'bg-gray-50' }} border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Régime micro-foncier</h3>
                            @if($microFoncierEligible)
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Éligible</span>
                            @else
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">Non éligible</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Déclaration</span>
                            <span class="font-medium">Case 4 BE - n°2042</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Montant à déclarer</span>
                            <span class="font-bold text-lg">{{ number_format($microFoncierTotal, 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Abattement (30%)</span>
                            <span class="text-green-600 font-medium">- {{ number_format($microFoncierAbattement, 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Base imposable</span>
                            <span class="font-bold text-lg">{{ number_format($microFoncierImpose, 2, ',', ' ') }} €</span>
                        </div>
                    </div>
                </div>

                <!-- Régime réel -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6 {{ $regimeReelObligatoire ? 'bg-blue-50' : 'bg-gray-50' }} border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Régime réel</h3>
                            @if($regimeReelObligatoire)
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Obligatoire</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Déclaration</span>
                            <span class="font-medium">Case 4 BA - n°2044</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b">
                            <span class="text-gray-600">Montant à déclarer</span>
                            <span class="font-bold text-lg">{{ number_format($regimeReelTotal, 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Base imposable</span>
                            <span class="font-bold text-lg">{{ number_format($regimeReelImpose, 2, ',', ' ') }} €</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($microFoncierEligible && $differenceImposition != 0)
                <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                    <p class="text-yellow-800">
                        <span class="font-medium">Comparaison des régimes :</span>
                        En choisissant le régime micro-foncier, votre base imposable sera réduite de
                        {{ number_format(abs($differenceImposition), 2, ',', ' ') }} €
                        par rapport au régime réel.
                    </p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
