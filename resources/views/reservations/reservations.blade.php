<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">

            <!-- Section to create a new reservation -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Créer une nouvelle réservation</h1>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="locataire_id" class="block text-gray-700 dark:text-gray-300">Locataire</label>
                        <select required name="locataire_id" id="locataire_id" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            @foreach($locataires as $locataire)
                                <option value="{{ $locataire->id }}">{{ $locataire->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="box_id" class="block text-gray-700 dark:text-gray-300">Boxe(s) disponible(s)</label>
                        <select required name="box_id" id="box_id" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            @foreach($boxes as $box)
                                <option value="{{ $box->id }}">{{ $box->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date_debut" class="block text-gray-700 dark:text-gray-300">Date de Début</label>
                        <input required type="date" name="date_debut" id="date_debut" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="date_fin" class="block text-gray-700 dark:text-gray-300">Date de Fin</label>
                        <input required type="date" name="date_fin" id="date_fin" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="modele_id" class="block text-gray-700 dark:text-gray-300">Contrat(s) disponible(s)</label>
                        <select required name="modele_id" id="modele_id" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" onchange="loadContractContent()">
                            @foreach($modeles as $modele)
                                <option value="{{ $modele->id }}" data-content="{{ $modele->content }}">{{ $modele->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="contract_content" class="block text-gray-700 dark:text-gray-300">Contenu du Contrat</label>
                        <textarea name="contract_content" id="contract_content" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Créer</button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Liste des Réservations actives</h1>

                @if($reservations->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Aucune réservation trouvée.</p>
                @else
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Locataire</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Boxe</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Date de Début</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Date de Fin</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <a href="{{ route('locataires.show', $reservation->locataire_id) }}">
                                        {{ $reservation->locataire->nom }}
                                    </a>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <a href="{{ route('boxes.show', $reservation->box_id) }}">
                                        {{ $reservation->boxe->name }}
                                    </a>
                                </td>

                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $reservation->date_debut }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $reservation->date_fin }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18M8 6V4h8v2M10 11v6M14 11v6M5 6l1 14h12l1-14"/>
                                            </svg>
                                        </button>
                                    </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <script>
        function loadContractContent() {
            const select = document.getElementById('modele_id');
            const content = select.options[select.selectedIndex].getAttribute('data-content');
            document.getElementById('contract_content').value = content;
            document.getElementById('display_content').innerText = content;
        }
    </script>

    <div id="display_content" class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md border dark:border-gray-700 mt-4"></div>
</x-app-layout>
