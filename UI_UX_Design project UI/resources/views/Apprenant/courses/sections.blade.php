@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Sections pour {{ $autoformation->title }}</h1>

        @if (isset($sections) && $sections->count() > 0)
            <div class="bg-white shadow rounded-lg divide-y divide-gray-200">
                @foreach ($sections as $section)
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $section['title'] }}</div>
                            {{-- Optionally display status or other info --}}
                            {{-- <div class="text-sm text-gray-600">Status: {{ $section['etat'] }}</div> --}}
                            {{-- Optionally display links if they exist --}}
                            {{-- @if ($section['github_link'])<div class="text-sm text-blue-600"><a href="{{ $section['github_link'] }}">GitHub Link</a></div>@endif --}}
                            {{-- @if ($section['project_link'])<div class="text-sm text-blue-600"><a href="{{ $section['project_link'] }}">Project Link</a></div>@endif --}}
                            {{-- @if ($section['slide_link'])<div class="text-sm text-blue-600"><a href="{{ $section['slide_link'] }}">Slide Link</a></div>@endif --}}
                        </div>
                        {{-- Always show Edit button --}}
                        {{-- Use a button or anchor with a class to trigger the modal --}}
                        {{-- Store data attributes for JS to use --}}
                        <button class="edit-realisation-button bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-md transition duration-150 ease-in-out"
                                data-autoformation-id="{{ $autoformation->id }}"
                                data-tutorial-id="{{ $section['id'] }}"
                                data-realisation-id="{{ $section['realisation_id'] ?? '' }}" {{-- Pass existing realisation ID if available --}}
                                data-status="{{ $section['etat'] }}"
                                data-github-link="{{ $section['github_link'] ?? '' }}"
                                data-project-link="{{ $section['project_link'] ?? '' }}"
                                data-slide-link="{{ $section['slide_link'] ?? '' }}">
                                Modifier
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No sections or lectures available for this course yet.</p>
        @endif
    </div>

    {{-- Modal Structure (Tailwind CSS example) --}}
    <div id="editRealisationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Mettre à jour le statut </h3>
                <div class="mt-2 px-7 py-3">
                    {{-- Form goes here --}}
                    <form id="editRealisationForm" class="space-y-4">
                        @csrf
                        <input type="hidden" name="tutorial_id" id="tutorial_id">
                        <input type="hidden" name="realisation_id" id="realisation_id">

                        {{-- Status Field --}}
                        <div class="mb-4">
                            <label for="modalStatus" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select name="status" id="modalStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="not_started">Not Started</option>
                                <option value="encours">In Progress</option>
                                <option value="termine">Completed</option>
                                <option value="abandonne">Abandoned</option>
                            </select>
                        </div>

                        {{-- GitHub Link Field --}}
                        <div class="mb-4">
                            <label for="modalGithubLink" class="block text-gray-700 text-sm font-bold mb-2">Lien GitHub:</label>
                            <input type="text" name="github_link" id="modalGithubLink" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Project Link Field --}}
                        <div class="mb-4">
                            <label for="modalProjectLink" class="block text-gray-700 text-sm font-bold mb-2">Lien du projet:</label>
                            <input type="text" name="project_link" id="modalProjectLink" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        {{-- Slide Link Field --}}
                        <div class="mb-4">
                            <label for="modalSlideLink" class="block text-gray-700 text-sm font-bold mb-2">Lien des Slide:</label>
                            <input type="text" name="slide_link" id="modalSlideLink" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="items-center px-4 py-3">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                Enregistrer
                            </button>
                             <button type="button" class="close-modal mt-3 px-4 py-2 bg-gray-200 text-gray-700 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 