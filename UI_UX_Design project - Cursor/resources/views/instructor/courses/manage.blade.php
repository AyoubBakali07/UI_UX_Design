<x-app-layout>
    <div class="space-y-6">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Gestion des sections et tutoriels</h1>
                <p class="mt-2 text-sm text-gray-700">Une liste de toutes les sections et tutoriels disponibles dans vos cours.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" @click="$dispatch('open-modal', 'create-section')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                    Ajouter une section
                </button>
            </div>
        </div>

        <!-- Sections Accordion -->
        <div class="space-y-4">
            @foreach($sections as $section)
            <div class="bg-white shadow rounded-lg" x-data="{ open: false }">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <button @click="open = !open" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-5 w-5" :class="{ 'transform rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                            <h3 class="ml-2 text-lg leading-6 font-medium text-gray-900">{{ $section->title }}</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button type="button" @click="$dispatch('open-modal', 'edit-section-{{ $section->id }}')" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button type="button" @click="$dispatch('open-modal', 'delete-section-{{ $section->id }}')" class="text-gray-400 hover:text-red-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div x-show="open" x-collapse>
                    <div class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <div class="flex justify-end mb-4">
                                <button type="button" @click="$dispatch('open-modal', 'create-tutorial-{{ $section->id }}')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Ajouter un tutoriel
                                </button>
                            </div>
                            <div class="space-y-4">
                                @foreach($section->tutorials as $tutorial)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">{{ $tutorial->title }}</h4>
                                            <p class="text-sm text-gray-500">{{ $tutorial->description }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <button type="button" @click="$dispatch('open-modal', 'edit-tutorial-{{ $tutorial->id }}')" class="text-gray-400 hover:text-gray-500">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </button>
                                            <button type="button" @click="$dispatch('open-modal', 'delete-tutorial-{{ $tutorial->id }}')" class="text-gray-400 hover:text-red-500">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Create Section Modal -->
    <x-modal name="create-section" focusable>
        <form method="POST" action="{{ route('sections.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Créer une nouvelle section
            </h2>
            <div class="mt-6">
                <x-input-label for="title" value="Titre" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="Description" />
                <x-textarea id="description" name="description" class="mt-1 block w-full" rows="3" required />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>
                <x-primary-button class="ml-3">
                    Créer
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Create Tutorial Modal -->
    <x-modal name="create-tutorial" focusable>
        <form method="POST" action="{{ route('tutorials.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                Créer un nouveau tutoriel
            </h2>
            <div class="mt-6">
                <x-input-label for="tutorial_title" value="Titre" />
                <x-text-input id="tutorial_title" name="title" type="text" class="mt-1 block w-full" required />
            </div>
            <div class="mt-6">
                <x-input-label for="tutorial_description" value="Description" />
                <x-textarea id="tutorial_description" name="description" class="mt-1 block w-full" rows="3" required />
            </div>
            <div class="mt-6">
                <x-input-label for="content" value="Contenu" />
                <x-textarea id="content" name="content" class="mt-1 block w-full" rows="10" required />
            </div>
            <div class="mt-6">
                <x-input-label for="duration" value="Durée estimée (en heures)" />
                <x-text-input id="duration" name="duration" type="number" class="mt-1 block w-full" required />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>
                <x-primary-button class="ml-3">
                    Créer
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout> 