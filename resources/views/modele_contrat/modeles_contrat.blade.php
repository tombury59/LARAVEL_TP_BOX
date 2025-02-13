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

                @if($modeles->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Aucun modèle de contrat trouvé.</p>
                @else
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Modèle</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Description</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modeles as $modele)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $modele->name }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $modele->content }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
{{--                                    <a href="{{ route('modeles_contrat.show', $modele->id) }}" class="text-blue-600 hover:text-blue-900">Voir</a>--}}
{{--                                    <a href="{{ route('modeles_contrat.edit', $modele->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Modifier</a>--}}
{{--                                    <form action="{{ route('modeles_contrat.destroy', $modele->id) }}" method="POST" class="inline">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Supprimer</button>--}}
{{--                                    </form>--}}
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
{{--                <form action="{{ route('modeles_contrat.store') }}" method="POST">--}}
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
