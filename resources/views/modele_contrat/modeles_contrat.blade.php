<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modèles de Contrat') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Liste des Modèles de Contrat</h1>

                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-500 text-white p-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if($modeles->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Aucun modèle de contrat trouvé.</p>
                @else
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Modèle</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Contenu</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modeles as $modele)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $modele->name }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700" style="white-space: pre-wrap;">{{ $modele->content }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <a href="{{ route('modele_contrat.show', $modele->id) }}" class="text-blue-600 hover:text-blue-900 flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Voir
                                    </a>
                                    <a href="{{ route('modele_contrat.edit', $modele->id) }}" class="text-yellow-600 hover:text-yellow-900 flex items-center ml-4">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-4 4m0 0l-4-4m4 4V3"></path>
                                        </svg>
                                        Modifier
                                    </a>
                                    <form action="{{ route('modele_contrat.destroy', $modele->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 flex items-center ml-4">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Section to create a new contract model -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Créer un nouveau modèle de contrat</h1>
                <form action="{{ route('modele_contrat.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 dark:text-gray-300">Nom du Modèle</label>
                        <input type="text" name="nom" id="nom" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" id="description" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
