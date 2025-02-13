<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Modèle de Contrat') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modifier le Modèle de Contrat</h1>
                <form action="{{ route('modele_contrat.update', $modele->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 dark:text-gray-300">Nom du Modèle</label>
                        <input type="text" name="nom" id="nom" value="{{ $modele->name }}" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" rows="10" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ $modele->content }}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
