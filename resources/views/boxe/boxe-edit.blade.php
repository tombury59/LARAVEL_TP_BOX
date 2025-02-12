<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modifier la Boxe') }}
            </h2>
            <div>
                <a href="{{ route('boxes.index') }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">
                    Retour à la liste
                </a>
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

                    <form action="{{ route('boxes.edit', ['id' => $boxe->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex justify-between items-start mb-6">
                            <h1 class="text-3xl font-bold text-gray-800">Modifier la Boxe</h1>
                            <div class="flex items-center">

                                <label class="inline-flex items-center me-5 cursor-pointer">
                                    @if($boxe->status == 0)
                                        <input name="status" type="checkbox" value="off" class="sr-only peer">
                                    @else
                                        <input name="status" type="checkbox" value="on" class="sr-only peer" checked>
                                    @endif
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>


                                    @if($boxe->status == 0)
                                        <span id='onoff' class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">❌</span>
                                    @else
                                        <span id='onoff' class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">✅</span>
                                        @endif
                                    <script>
                                        const checkbox = document.querySelector('input[name="status"]');
                                        const onoff = document.getElementById('onoff');

                                        checkbox.addEventListener('change', function() {

                                            if (checkbox.checked) {
                                                checkbox.value = "on";
                                                onoff.textContent = "✅";
                                            } else {
                                                checkbox.value = "off";
                                                onoff.textContent = "❌";
                                            }
                                        });

                                    </script>

                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Nom de la Boxe</h2>
                                <input type="text" name="name" value="{{ old('name', $boxe->name) }}" class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-indigo-100" required>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Description</h2>
                                <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-indigo-100" required>{{ old('description', $boxe->description) }}</textarea>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Taille de la Boxe</h2>
                                <input type="text" name="taille" value="{{ old('size', $boxe->taille) }}" class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-indigo-100" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Adresse</h2>
                                <input type="text" name="address" value="{{ old('address', $boxe->address) }}" class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-indigo-100" required>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-700 mb-2">Prix</h2>
                                <input type="number" name="price" step="0.01" value="{{ old('price', $boxe->price) }}" class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-indigo-100" required>
                            </div>


                        </div>

                        <div class="mt-8">
                            <div class="flex space-x-4">
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors duration-300">Valider les modifications</button>
                                <a href="{{ route('boxes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-300">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
