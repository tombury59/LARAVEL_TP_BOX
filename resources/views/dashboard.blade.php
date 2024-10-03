<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ __("Bienvenue dans votre espace de gestion !") }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <a href="{{ route('boxes.index') }}" class="block p-6 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors">
                            <h4 class="font-bold">Gestion des box</h4>
                            <p class="text-sm">Gérez vos box de stockage</p>
                        </a>
{{--                        {{ route('tenants.index') }}--}}
                        <a href="" class="block p-6 bg-green-100 rounded-lg hover:bg-green-200 transition-colors">
                            <h4 class="font-bold">Gestion des locataires</h4>
                            <p class="text-sm">Gérez vos locataires</p>
                        </a>
{{--                        {{ route('contract-templates.index') }}--}}
                        <a href="" class="block p-6 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors">
                            <h4 class="font-bold">Modèles de contrats</h4>
                            <p class="text-sm">Gérez vos modèles de contrats</p>
                        </a>
{{--                        {{ route('contracts.index') }}--}}
                        <a href="" class="block p-6 bg-purple-100 rounded-lg hover:bg-purple-200 transition-colors">
                            <h4 class="font-bold">Gestion des contrats</h4>
                            <p class="text-sm">Gérez vos contrats actifs</p>
                        </a>
{{--                        {{ route('tax-calculator') }}--}}
                        <a href="" class="block p-6 bg-red-100 rounded-lg hover:bg-red-200 transition-colors">
                            <h4 class="font-bold">Calcul des impôts</h4>
                            <p class="text-sm">Calculez vos impôts</p>
                        </a>
{{--                        {{ route('invoices.index') }}--}}
                        <a href="" class="block p-6 bg-indigo-100 rounded-lg hover:bg-indigo-200 transition-colors">
                            <h4 class="font-bold">Gestion des factures</h4>
                            <p class="text-sm">Gérez vos factures</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
