@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Tutorial Realisation</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">
                {{ $tutoriel->title }} ({{ $autoformation->title }})
            </h2>

            <form action="{{-- Add your update route here --}}" method="POST">
                @csrf
                @method('PUT') {{-- Or PATCH if you prefer --}}

                {{-- Example form field for status --}}
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                    <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="not_started" {{ $realisation->etat == 'not_started' ? 'selected' : '' }}>Not Started</option>
                        <option value="encours" {{ $realisation->etat == 'encours' ? 'selected' : '' }}>In Progress</option>
                        <option value="termine" {{ $realisation->etat == 'termine' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                {{-- Example form field for GitHub Link --}}
                <div class="mb-4">
                    <label for="github_link" class="block text-gray-700 text-sm font-bold mb-2">GitHub Link:</label>
                    <input type="text" name="github_link" id="github_link" value="{{ old('github_link', $realisation->github_link) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                {{-- Add other fields like project_link, slide_link here --}}

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Realisation
                    </button>
                    <a href="{{ route('Apprenant.course.sections', ['autoformationId' => $autoformation->id]) }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection 