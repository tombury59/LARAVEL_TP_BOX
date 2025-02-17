<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 py-6">
        <div class="w-full max-w-7xl mx-auto p-8">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Reservations List Section -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Liste des Réservations actives</h1>

                @if($reservations->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">Aucune réservation trouvée.</p>
                @else
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
                        <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Numéro contrat</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Locataire</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Nom du Boxe</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Date de Début</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Date de Fin</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Générer facture mensuel</th>
                            <th class="py-3 px-4 border-b dark:border-gray-700 text-left text-gray-600 dark:text-gray-300">Supprimer</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $reservation->id }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    {{ $reservation->locataire->nom }}
                                </td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    {{ $reservation->boxe->name }}
                                </td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $reservation->date_debut }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">{{ $reservation->date_fin }}</td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                        <a href="{{route('factures.show_create_factures_monthly',$reservation->id)}}">Générer</a>
                                    </button>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-gray-700">
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6h14z"
                                                      stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <line x1="10" y1="10" x2="10" y2="16" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                                <line x1="14" y1="10" x2="14" y2="16" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Section to create a new reservation -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700 mt-2">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Créer une nouvelle réservation</h1>
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="locataire_id" class="block text-gray-700 dark:text-gray-300">Locataire</label>
                        <select required name="locataire_id" id="locataire_id" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            @foreach($locataires as $locataire)
                                <option value="{{ $locataire->id }}" data-prenom="{{ $locataire->prenom }}">{{ $locataire->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="box_id" class="block text-gray-700 dark:text-gray-300">Boxe(s) disponible(s)</label>
                        <select required name="box_id" id="box_id" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" onchange="updateBoxPrice()">
                            @foreach($boxes as $box)
                                <option value="{{ $box->id }}" data-price="{{ $box->price }}">{{ $box->name }}</option>
                                <input type="hidden" name="proprioNom" id="proprioNom" value="{{ $box->proprietaire->name }}">
                                <input type="hidden" name="proprioEmail" id="proprioEmail" value="{{ $box->proprietaire->email }}">
                                <input type="hidden" name="boxName" id="boxName" value="{{ $box->name }}">
                                <input type="hidden" name="boxTaille" id="boxTaille" value="{{ $box->taille }}">
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
                        <label for="price" class="block text-gray-700 dark:text-gray-300">Prix par mois</label>
                        <input required value="0" type="number" name="price" id="price" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
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
                        <div id="editorjs" class="w-full mt-2 p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></div>
                        <input type="hidden" name="contract_content" id="contract_content">
                    </div>
                    <button type="button" id="fill-button" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Remplir le contrat</button>
                    <!-- Section d'erreur pour le message -->
                    <div id="error-message" class="text-red-600 dark:text-red-400 text-sm mt-2 hidden">
                        Le contrat n'est pas complet. Veuillez remplir les champs manquants.
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" id="create-button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-editorjs-scripts />

    <script>
        let editor;

        function updateBoxPrice() {
            const boxSelect = document.getElementById('box_id');
            const priceInput = document.getElementById('price');

            if (!boxSelect || !priceInput) return;

            const selectedOption = boxSelect.options[boxSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            priceInput.value = price;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateBoxPrice(); // Set initial price when the page loads

            const boxSelect = document.getElementById('box_id');
            boxSelect.addEventListener('change', updateBoxPrice); // Update price when a new box is selected
        });

        function loadContractContent() {
            const selectModele = document.getElementById('modele_id');
            const createButton = document.getElementById('create-button');
            const errorMessage = document.getElementById('error-message');

            if (!selectModele || !createButton || !errorMessage) return;

            let content;
            try {
                content = JSON.parse(selectModele.options[selectModele.selectedIndex].getAttribute('data-content'));
            } catch (e) {
                content = {
                    blocks: []
                };
            }
            if (editor) {
                editor.destroy();
            }
            editor = new EditorJS({
                holder: 'editorjs',
                data: content,
                onReady: function() {
                    editor.save().then((outputData) => {
                        document.getElementById('contract_content').value = JSON.stringify(outputData);
                    }).catch((error) => {
                        console.error('Saving failed: ', error);
                    });
                },
                onChange: function() {
                    editor.save().then((outputData) => {
                        document.getElementById('contract_content').value = JSON.stringify(outputData);
                    }).catch((error) => {
                        console.error('Saving failed: ', error);
                    });
                },
                tools: editorTools
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            loadContractContent();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const fillButton = document.getElementById('fill-button');
            if (fillButton) {

                fillButton.addEventListener('click', function() {
                    const locataireSelect = document.getElementById('locataire_id');
                    const selectedLocataire = locataireSelect.options[locataireSelect.selectedIndex];
                    const locataireNom = selectedLocataire.text;
                    const locatairePrenom = selectedLocataire.getAttribute('data-prenom');

                    const priceInput = document.getElementById('price');
                    const price = priceInput.value;

                    fillContractFields({
                        '##NOM##': locataireNom,
                        '##PRENOM##': locatairePrenom,
                        '##PRICE##': price,
                        '##DATE_DEBUT##': document.getElementById('date_debut').value,
                        '##DATE_FIN##': document.getElementById('date_fin').value,
                        '##PROPRIO_NOM##': document.getElementById('proprioNom').value,
                        '##PROPRIO_EMAIL##': document.getElementById('proprioEmail').value,
                        '##BOX_NAME##': document.getElementById('boxName').value,
                        '##BOX_TAILLE##': document.getElementById('boxTaille').value
                    });
                });
            } else {
                console.error('Fill button not found in the current page.');
            }
        });

        function fillContractFields(replacements) {
            editor.save().then((outputData) => {
                const blocks = outputData.blocks;

                blocks.forEach((block) => {
                    if (block && block.data) {
                        if (block.data.text) {
                            let text = block.data.text;

                            // Remplacer uniquement les champs spécifiques
                            Object.entries(replacements).forEach(([key, value]) => {
                                const regex = new RegExp(key, 'g');
                                text = text.replace(regex, value || '');
                            });

                            block.data.text = text;
                        }

                        if (block.data.items && Array.isArray(block.data.items)) {
                            block.data.items = block.data.items.map(item => {
                                let text = item;

                                // Remplacer uniquement les champs spécifiques
                                Object.entries(replacements).forEach(([key, value]) => {
                                    const regex = new RegExp(key, 'g');
                                    text = text.replace(regex, value || '');
                                });

                                return text;
                            });
                        }
                    }
                });

                const updatedData = { blocks: blocks };

                editor.destroy();
                editor = new EditorJS({
                    holder: 'editorjs',
                    data: updatedData,
                    tools: editorTools,
                    onReady: function() {
                        document.getElementById('contract_content').value = JSON.stringify(updatedData);
                    }
                });
            }).catch(error => {
                console.error('Erreur lors de la mise à jour du contrat:', error);
            });
        }
    </script>
</x-app-layout>
