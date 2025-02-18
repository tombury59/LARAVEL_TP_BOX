<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Contrat') }}
            </h2>
            <nav class="flex space-x-4">
                <a href="{{ route('reservations.reservations') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour aux réservations
                </a>
            </nav>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <!-- Actions Bar -->
                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Détails du contrat</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route('contrats.pdf', $modele->id) }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Télécharger PDF
                        </a>
                    </div>
                </div>

                <!-- Ligne de séparation décorative -->
                <div class="h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>

                <!-- Zone de contenu EditorJS -->
                <div id="editorjs-viewer" class="px-8 py-6 prose prose-sm max-w-none">
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
            data: editorData,
            tools: {
                // Configuration des outils si nécessaire
            }
        });
    </script>

    <style>
        .prose {
            color: #374151;
            line-height: 1.75;
        }
        .prose h1, .prose h2, .prose h3, .prose h4 {
            color: #111827;
            font-weight: 600;
            margin-top: 2em;
            margin-bottom: 1em;
        }
        .prose p {
            margin-bottom: 1.25em;
        }
    </style>
</x-app-layout>
