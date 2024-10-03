<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vos Boxes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Vos Boxes</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($boxes as $index => $boxe)
                            <div class="rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg
                                {{ $index % 5 === 0 ? 'bg-blue-50' :
                                   ($index % 5 === 1 ? 'bg-green-50' :
                                   ($index % 5 === 2 ? 'bg-yellow-50' :
                                   ($index % 5 === 3 ? 'bg-purple-50' : 'bg-pink-50'))) }}">

                                <div class="p-6">
                                    <div class="flex flex-row justify-between ">
                                        @if($boxe->status == 0)
                                            <svg title="Box indisponible" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                                                <path d="M 25 2 C 12.326643 2 2 12.326643 2 25 C 2 37.673357 12.326643 48 25 48 C 37.673357 48 48 37.673357 48 25 C 48 12.326643 37.673357 2 25 2 z M 25 4 C 36.588643 4 46 13.411357 46 25 C 46 36.588643 36.588643 46 25 46 C 13.411357 46 4 36.588643 4 25 C 4 13.411357 13.411357 4 25 4 z M 25 6 C 20.523675 6 16.401638 7.5702753 13.152344 10.169922 L 12.28125 10.867188 L 39.132812 37.71875 L 39.830078 36.847656 C 42.429725 33.598362 44 29.476325 44 25 C 44 14.532599 35.467401 6 25 6 z M 25 8 C 34.382599 8 42 15.617401 42 25 C 42 28.596865 40.748192 31.842246 38.833984 34.591797 L 15.408203 11.166016 C 18.157754 9.2518073 21.403135 8 25 8 z M 10.867188 12.28125 L 10.169922 13.152344 C 7.5702753 16.401638 6 20.523675 6 25 C 6 35.467401 14.532599 44 25 44 C 29.476325 44 33.598362 42.429725 36.847656 39.830078 L 37.71875 39.132812 L 10.867188 12.28125 z M 11.166016 15.408203 L 34.591797 38.833984 C 31.842246 40.748192 28.596865 42 25 42 C 15.617401 42 8 34.382599 8 25 C 8 21.403135 9.2518073 18.157754 11.166016 15.408203 z"></path>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">
                                                <defs>
                                                </defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 7 C 24.047 7 7 24.047 7 45 s 17.047 38 38 38 s 38 -17.047 38 -38 S 65.953 7 45 7 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    <path d="M 42.245 62.755 c -1.021 0 -1.992 -0.445 -2.657 -1.222 L 22.121 41.159 c -1.258 -1.468 -1.088 -3.678 0.379 -4.936 c 1.466 -1.258 3.677 -1.089 4.935 0.379 L 42.162 53.78 l 20.334 -25.231 c 1.215 -1.506 3.417 -1.741 4.922 -0.529 c 1.505 1.214 1.742 3.417 0.529 4.922 L 44.97 61.451 c -0.653 0.81 -1.632 1.287 -2.672 1.304 C 42.28 62.755 42.262 62.755 42.245 62.755 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        @endif
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $boxe->name }}</h2>

                                        <a href="{{ route('boxes.show', $boxe) }}" class="px-4 py-2 bg-indigo-100 text-white rounded-md hover:bg-indigo-700 transition-colors duration-300">
                                            <svg width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#000000" fill-rule="evenodd" d="M8 3.517a1 1 0 011.62-.784l5.348 4.233a1 1 0 010 1.568l-5.347 4.233A1 1 0 018 11.983v-1.545c-.76-.043-1.484.003-2.254.218-.994.279-2.118.857-3.506 1.99a.993.993 0 01-1.129.096.962.962 0 01-.445-1.099c.415-1.5 1.425-3.141 2.808-4.412C4.69 6.114 6.244 5.241 8 5.042V3.517zm1.5 1.034v1.2a.75.75 0 01-.75.75c-1.586 0-3.066.738-4.261 1.835a8.996 8.996 0 00-1.635 2.014c.878-.552 1.695-.916 2.488-1.138 1.247-.35 2.377-.33 3.49-.207a.75.75 0 01.668.745v1.2l4.042-3.2L9.5 4.55z" clip-rule="evenodd"/></svg>
                                        </a>
                                    </div>

                                    <p class="text-gray-600 mb-4">{{ Str::limit($boxe->description, 30) }}</p>
                                    <div class="flex items-center text-gray-500 mb-2">
                                        {{ $boxe->address }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-gray-500">
                                Aucune box disponible pour le moment.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $boxes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
