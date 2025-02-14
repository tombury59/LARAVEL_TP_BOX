<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier Modèle de Contrat') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Modifier Modèle de Contrat</h1>
                <form action="{{ route('modele_contrat.update', $modele->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nom" class="block text-gray-700 dark:text-gray-300">Nom du Modèle</label>
                        <input type="text" name="name" id="nom" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" value="{{ $modele->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 dark:text-gray-300">Contenu du contrat</label>
                        <div id="editorjs" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                        <input type="hidden" name="content" id="content" value="{{ $modele->content }}">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-editorjs-scripts />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editor = new EditorJS({
                holder: 'editorjs',
                data: {!! $modele->content !!},
                tools: editorTools,
                onChange: function() {
                    editor.save().then((outputData) => {
                        document.getElementById('content').value = JSON.stringify(outputData);
                    }).catch((error) => {
                        console.error('Saving failed: ', error);
                    });
                }
            });
        });
    </script>
</x-app-layout>
