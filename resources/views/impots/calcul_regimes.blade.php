<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calcul des Régimes Fiscaux') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Régime micro-foncier</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Doit être inférieur à 15.000€ annuel</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Case 4 BE déclaration n°2042</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Quel montant total je dois mettre dans cette case :</p>
                <p class="text-gray-800 dark:text-white mb-4">{{ $microFoncierTotal }} €</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Sur quel montant serais-je imposé ? (abattement de 30%) :</p>
                <p class="text-gray-800 dark:text-white mb-4">{{ $microFoncierImpose }} €</p>
            </div>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Régime réel</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Obligatoire si supérieur à 15.000€ annuel</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Case 4 BA déclaration n°2044</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Quel montant total je dois mettre dans cette case :</p>
                <p class="text-gray-800 dark:text-white mb-4">{{ $regimeReelTotal }} €</p>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Sur quel montant serais-je imposé ? :</p>
                <p class="text-gray-800 dark:text-white mb-4">{{ $regimeReelImpose }} €</p>
            </div>
        </div>
    </div>
</x-app-layout>
