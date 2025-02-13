<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du Modèle de Contrat') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">{{ $modele->name }}</h1>
                <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $modele->content }}</p>
                <a href="{{ route('modele_contrat.modeles_contrat') }}" class="text-blue-600 hover:text-blue-900">Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>
