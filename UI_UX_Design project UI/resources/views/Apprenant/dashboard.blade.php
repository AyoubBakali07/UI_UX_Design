@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg  p-6 mb-8">
        <h2 class="text-xl font-semibold mb-4">
            @if(isset($autoformation))
                Progression pour {{ $autoformation->title }}
            @else
                Ma progression globale
            @endif
        </h2>
        <div class="h-3 bg-gray-200 rounded-full mb-2">
            <div class="bg-blue-500 h-full rounded-full" style="width: {{ $progress }}%;"></div>
        </div>
        <div class="flex justify-between text-gray-600 text-sm">
            <span>{{ $completedTutoriels }} sur {{ $totalTutoriels }} tutoriels complétés</span>
            <span class="font-semibold text-blue-600">{{ $progress }}%</span>
        </div>
    </div>
    <h1 class="text-2xl font-bold mb-4">Mes Informations</h1>

    <div x-data="modalHandler()">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nom du cours
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date de début
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Statut
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Liens
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($inProgressTutorials as $tutorial)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $tutorial['name'] }}</div>
                        <div class="text-sm text-gray-500">({{ $tutorial['autoformation_name'] }})</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $tutorial['start'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center text-sm text-gray-500">
                            @if ($tutorial['status'] == 'Terminé')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Terminé
                            @elseif ($tutorial['status'] == 'En cours')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                En cours
                            @else
                                {{ $tutorial['status'] }}
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <a href="https://www.w3schools.com/" target="_blank" class="inline-block p-2 rounded hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <button 
                            class="bg-white border border-gray-300 rounded px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                            @click="openModal($event, {{ json_encode($tutorial) }})"
                        >Mettre à jour</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal for updating status and links -->
    <div x-show="show" class="fixed inset-0 z-40 flex items-center justify-center" style="display: none;">
        <div class="absolute inset-0 bg-black/40" @click="close"></div>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative z-10" @click.away="close">
            <h2 class="text-xl font-bold mb-2">Mettre à jour le statut</h2>
            <p class="mb-4 text-gray-500">Ajoutez votre progression et des liens vers vos ressources.</p>
            <form @submit.prevent="save">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Statut</label>
                    <select x-model="tutorial.status" class="w-full border rounded px-3 py-2">
                        <option value="Non commencé">Non commencé</option>
                        <option value="encours">En cours</option>
                        <option value="termine">Terminé</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Lien GitHub</label>
                    <input type="url" x-model="tutorial.github" class="w-full border rounded px-3 py-2" placeholder="https://github.com/username/repo">
                </div>
                <!-- <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Lien du projet</label>
                    <input type="url" x-model="tutorial.project" class="w-full border rounded px-3 py-2" placeholder="https://mon-projet.com">
                </div> -->
                <!-- <div class="mb-4">
                    <label class="block text-gray-700 mb-1">Lien des slides</label>
                    <input type="url" x-model="tutorial.slides" class="w-full border rounded px-3 py-2" placeholder="https://slides.com/presentation">
                </div> -->
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="close" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-700">Annuler</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Enregistrer</button>
                </div>
            </form>
            <button @click="close" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700">&times;</button>
        </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function modalHandler() {
    return {
        show: false,
        tutorial: {
            id: null,
            status: 'Non commencé',
            github: '',
            project: '',
            slides: ''
        },
        openModal(event, tutorial) {
            this.tutorial = {
                id: tutorial.id,
                status: tutorial.status || 'Non commencé',
                github: tutorial.github || '',
                project: tutorial.project || '',
                slides: tutorial.slides || ''
            };
            this.show = true;
        },
        close() {
            this.show = false;
        },
        save() {
            // TODO: Send AJAX request to update tutorial (implement as needed)
            alert('Données enregistrées pour le tutoriel ID: ' + this.tutorial.id);
            this.close();
        }
    }
}
</script>
@endsection