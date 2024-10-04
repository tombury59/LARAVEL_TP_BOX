<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails de la Boxe') }}
            </h2>
            <div class="flex space-x-4">
                @if($previousBox)
                    <a href="{{ route('boxes.show', $previousBox->box_id) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">
                        &larr; Précédente
                    </a>
                @endif
                @if($nextBox)
                    <a href="{{ route('boxes.show', $nextBox->box_id) }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">
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
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">Succès!</span> La boite a été modifié avec succès !
                        </div>
                    @endif
                    <div class="flex justify-between items-start mb-6">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $boxe->name }}</h1>
                        <div class="flex items-center">
                            @if($boxe->status == 0)
                                <span class="ml-2 text-red-500 font-semibold">❌ Occupé </span>
                            @else
                                <span class="ml-2 text-green-500 font-semibold">✅ Disponible</span>
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
                                <p class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.15" d="M4 8C4 5.79086 5.79086 4 8 4H16C18.2091 4 20 5.79086 20 8V16C20 18.2091 18.2091 20 16 20H8C5.79086 20 4 18.2091 4 16V8Z" fill="#001A72"/>
                                        <path d="M10.5303 9.53033C10.8232 9.23744 10.8232 8.76256 10.5303 8.46967C10.2374 8.17678 9.76256 8.17678 9.46967 8.46967L10.5303 9.53033ZM7 12L6.46967 11.4697C6.17678 11.7626 6.17678 12.2374 6.46967 12.5303L7 12ZM9.46967 15.5303C9.76256 15.8232 10.2374 15.8232 10.5303 15.5303C10.8232 15.2374 10.8232 14.7626 10.5303 14.4697L9.46967 15.5303ZM13.4697 14.4697C13.1768 14.7626 13.1768 15.2374 13.4697 15.5303C13.7626 15.8232 14.2374 15.8232 14.5303 15.5303L13.4697 14.4697ZM17 12L17.5303 12.5303C17.8232 12.2374 17.8232 11.7626 17.5303 11.4697L17 12ZM14.5303 8.46967C14.2374 8.17678 13.7626 8.17678 13.4697 8.46967C13.1768 8.76256 13.1768 9.23744 13.4697 9.53033L14.5303 8.46967ZM9.46967 8.46967L6.46967 11.4697L7.53033 12.5303L10.5303 9.53033L9.46967 8.46967ZM6.46967 12.5303L9.46967 15.5303L10.5303 14.4697L7.53033 11.4697L6.46967 12.5303ZM14.5303 15.5303L17.5303 12.5303L16.4697 11.4697L13.4697 14.4697L14.5303 15.5303ZM17.5303 11.4697L14.5303 8.46967L13.4697 9.53033L16.4697 12.5303L17.5303 11.4697ZM8 4.75H16V3.25H8V4.75ZM19.25 8V16H20.75V8H19.25ZM16 19.25H8V20.75H16V19.25ZM4.75 16V8H3.25V16H4.75ZM8 19.25C6.20507 19.25 4.75 17.7949 4.75 16H3.25C3.25 18.6234 5.37665 20.75 8 20.75V19.25ZM19.25 16C19.25 17.7949 17.7949 19.25 16 19.25V20.75C18.6234 20.75 20.75 18.6234 20.75 16H19.25ZM16 4.75C17.7949 4.75 19.25 6.20507 19.25 8H20.75C20.75 5.37665 18.6234 3.25 16 3.25V4.75ZM8 3.25C5.37665 3.25 3.25 5.37665 3.25 8H4.75C4.75 6.20507 6.20507 4.75 8 4.75V3.25Z" fill="#001A72"/>
                                    </svg>

                                    Taille : {{ $boxe->taille }} m²
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Actions</h2>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('boxes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">Retour à la liste</a>

                            <a href="{{ route('boxes.edit', $boxe->box_id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors duration-300">Modifier</a>

                            <form action="{{ route('boxes.destroy', $boxe->box_id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette boxe ?');" class="inline">
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
