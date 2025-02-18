<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modèles de Contrat') }}
            </h2>
            <button id="createNewBtn" class="inline-flex items-center px-4 py-2 bg-indigo-400 text-white rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nouveau modèle
            </button>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Messages de notification -->
            @if(session('success'))
                <div class="mb-6 animate-fade-in-down">
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 animate-fade-in-down">
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            @endif

            <!-- Liste des modèles -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Modèles existants</h3>
                </div>

                @if($modeles->isEmpty())
                    <div class="p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Aucun modèle</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Commencez par créer votre premier modèle de contrat.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nom du Modèle
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Aperçu du Contenu
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($modeles as $modele)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $modele->name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">
                                            {{ $modele->content }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('modele_contrat.show', $modele->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                <span class="sr-only">Voir</span>
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>
                                            <a href="{{ route('modele_contrat.edit', $modele->id) }}"
                                               class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                                                <span class="sr-only">Modifier</span>
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('modele_contrat.destroy', $modele->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle ?')">
                                                    <span class="sr-only">Supprimer</span>
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Formulaire de création (initialement caché) -->
            <div id="createForm" class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Nouveau modèle de contrat</h3>
                </div>

                <form action="{{ route('modele_contrat.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nom du modèle
                        </label>
                        <input type="text"
                               name="name"
                               id="nom"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Variables disponibles
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mb-4 text-sm">
                            @foreach(['##NOM##', '##PRENOM##', '##PRICE##', '##DATE_DEBUT##', '##DATE_FIN##', '##BOX_NAME##','##PROPRIO_NOM##','##PROPRIO_EMAIL##','##BOX_NAME##','##BOX_TAILLE##'] as $variable)
                                <button type="button"
                                        onclick="insertVariable('{{ $variable }}')"
                                        class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                    <code>{{ $variable }}</code>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label for="editorjs" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Contenu du contrat
                        </label>
                        <div id="editorjs" class="border border-gray-300 dark:border-gray-600 rounded-lg"></div>
                        <input type="hidden" name="content" id="content">
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button"
                                id="cancelBtn"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Annuler
                        </button>
                        <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Créer le modèle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-editorjs-scripts />
    <script>
        // Initialisation de l'éditeur
        const editor = new EditorJS({
            holder: 'editorjs',
            tools: editorTools,
            placeholder: 'Commencez à rédiger votre contrat ici...',
            onChange: function() {
                editor.save().then((outputData) => {
                    document.getElementById('content').value = JSON.stringify(outputData);
                });
            }
        });

        // Gestion du formulaire
        const createNewBtn = document.getElementById('createNewBtn');
        const createForm = document.getElementById('createForm');
        const cancelBtn = document.getElementById('cancelBtn');

        createNewBtn.addEventListener('click', () => {
            createForm.classList.remove('hidden');
            createForm.scrollIntoView({ behavior: 'smooth' });
        });

        cancelBtn.addEventListener('click', () => {
            createForm.classList.add('hidden');
        });

        // Fonction pour insérer les variables
        function insertVariable(variable) {
            editor.blocks.insert('paragraph', {
                text: editor.blocks.getCurrentBlockIndex() === 0 ? variable : ' ' + variable
            });
        }
    </script>
</x-app-layout>
