<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos Locataires') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">Succès!</span> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">Erreur!</span> {{ session('error') }}
                    </div>
                @endif

                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Liste des Locataires</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($locataires as $index => $locataire)
                            <div class="rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg
                                {{ $index % 5 === 0 ? 'bg-blue-50' :
                                   ($index % 5 === 1 ? 'bg-green-50' :
                                   ($index % 5 === 2 ? 'bg-yellow-50' :
                                   ($index % 5 === 3 ? 'bg-purple-50' : 'bg-pink-50'))) }}">

                                <div class="p-6">
                                    <div class="flex flex-row justify-between">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $locataire->nom }} {{ $locataire->prenom }}</h2>
                                        <a href="{{ route('locataires.show', $locataire->locataire_id) }}" class="px-4 py-2 bg-indigo-100 text-white rounded-md hover:bg-indigo-700 transition-colors duration-300">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#000000" fill-rule="evenodd" d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z" clip-rule="evenodd"/></svg>
                                        </a>
                                    </div>

                                    <p class="text-gray-600 mb-4">{{ $locataire->email }}</p>
                                    <div class="flex items-center text-gray-500 mb-2">
                                        {{ $locataire->telephone }}
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-gray-500">
                                Aucun locataire disponible pour le moment.
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-8">
                        {{ $locataires->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
