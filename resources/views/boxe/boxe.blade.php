<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails de la Boxe') }}
            </h2>
            <div class="flex space-x-4">
                @if($previousBox)
                    <a href="{{ route('boxes.show', $previousBox) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">
                        &larr; Précédente
                    </a>
                @endif
                @if($nextBox)
                    <a href="{{ route('boxes.show', $nextBox) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">
                        Suivante &rarr;
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $boxe->name }}</h1>
                        <div class="flex items-center">
                            @if($boxe->status == 0)
                                <svg title="Box indisponible" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50" class="text-red-500">
                                    <path d="M25 2C12.326643 2 2 12.326643 2 25C2 37.673357 12.326643 48 25 48C37.673357 48 48 37.673357 48 25C48 12.326643 37.673357 2 25 2ZM25 4C36.588643 4 46 13.411357 46 25C46 36.588643 36.588643 46 25 46C13.411357 46 4 36.588643 4 25C4 13.411357 13.411357 4 25 4ZM25 6C20.523675 6 16.401638 7.5702753 13.152344 10.169922L12.28125 10.867188L39.132812 37.71875L39.830078 36.847656C42.429725 33.598362 44 29.476325 44 25C44 14.532599 35.467401 6 25 6ZM25 8C34.382599 8 42 15.617401 42 25C42 28.596865 40.748192 31.842246 38.833984 34.591797L15.408203 11.166016C18.157754 9.2518073 21.403135 8 25 8ZM10.867188 12.28125L10.169922 13.152344C7.5702753 16.401638 6 20.523675 6 25C6 35.467401 14.532599 44 25 44C29.476325 44 33.598362 42.429725 36.847656 39.830078L37.71875 39.132812L10.867188 12.28125ZM11.166016 15.408203L34.591797 38.833984C31.842246 40.748192 28.596865 42 25 42C15.617401 42 8 34.382599 8 25C8 21.403135 9.2518073 18.157754 11.166016 15.408203Z" fill="currentColor"/>
                                </svg>
                                <span class="ml-2 text-red-500 font-semibold">Indisponible</span>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 256 256" class="text-green-500">
                                    <path d="M45 90C20.187 90 0 69.813 0 45C0 20.187 20.187 0 45 0c24.813 0 45 20.187 45 45C90 69.813 69.813 90 45 90z" fill="currentColor"/>
                                    <path d="M42.245 62.755a3.626 3.626 0 01-2.657-1.222L22.121 41.159c-1.258-1.468-1.088-3.678.379-4.936 1.466-1.258 3.677-1.089 4.935.379L42.162 53.78l20.334-25.231c1.215-1.506 3.417-1.741 4.922-.529 1.505 1.214 1.742 3.417.529 4.922L44.97 61.451a3.631 3.631 0 01-2.672 1.304h-.053z" fill="#FFF"/>
                                </svg>
                                <span class="ml-2 text-green-500 font-semibold">Disponible</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700 mb-2">Description</h2>
                            <p class="text-gray-600">{{ $boxe->description }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700 mb-2">Informations</h2>
                            <div class="space-y-2">
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $boxe->address }}
                                </p>
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Prix : {{ number_format($boxe->price, 2) }} €
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Actions</h2>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('boxes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">Retour à la liste</a>

                            <a href="{{ route('boxes.edit', $boxe) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors duration-300">Modifier</a>

                            <form action="{{ route('boxes.destroy', $boxe) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette boxe ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-300">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
