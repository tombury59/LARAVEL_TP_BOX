<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Boxe') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-3xl mx-auto p-8">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Ajouter un Boxe</h1>

                <form method="POST" action="{{ route('boxes.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label for="name" class="block text-gray-700 dark:text-white mb-1">Nom du Boxe</label>
                            <input type="text" name="name" id="name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required>
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 dark:text-white mb-1">Description</label>
                            <textarea name="description" id="description" rows="3" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required></textarea>
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 dark:text-white mb-1">Adresse</label>
                            <input type="text" name="address" id="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required>
                        </div>

                        <div>
                            <label for="price" class="block text-gray-700 dark:text-white mb-1">Prix</label>
                            <input type="number" name="price" id="price" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required>
                        </div>

                        <div>
                            <label for="status" class="block text-gray-700 dark:text-white mb-1">Statut</label>
                            <select name="status" id="status" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required>
                                <option value="available">Disponible</option>
                                <option value="unavailable">Indisponible</option>
                            </select>
                        </div>

                        <div>
                            <label for="taille" class="block text-gray-700 dark:text-white mb-1">Taille</label>
                            <input type="text" name="taille" id="taille" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" required>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-700 dark:bg-teal-600 dark:text-white dark:hover:bg-teal-900">
                            Ajouter le Boxe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
