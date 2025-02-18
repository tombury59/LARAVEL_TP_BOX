<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contrat') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-md">
                <div class="mt-4 mb-5">
                    <a href="{{ route('reservations.reservations') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Retour</a>
                </div>
                <!-- En-tête du document -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <h3 class="text-lg font-medium text-gray-900">Détails du contrat</h3>
                </div>

                <!-- Zone de contenu EditorJS -->
                <div id="editorjs-viewer" class="px-6 py-4 text-gray-700 leading-relaxed">
                    <!-- Le contenu sera injecté ici -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script>
        const editorData = JSON.parse(<?php echo json_encode($modele->contenu); ?>);

        const editor = new EditorJS({
            holder: 'editorjs-viewer',
            readOnly: true,
            data: editorData
        });
    </script>
</x-app-layout>
