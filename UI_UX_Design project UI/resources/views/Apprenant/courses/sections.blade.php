@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Course Sections and Lectures</h1>

        {{-- Assuming $courseContent is passed to the view --}}
        @if (isset($courseContent) && $courseContent->count() > 0)
            <div class="bg-white shadow rounded-lg divide-y divide-gray-200">
                @foreach ($courseContent as $item)
                    <div class="px-6 py-4 flex items-center justify-between">
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $item->title }}</div>
                            {{-- Add any other relevant info here, e.g., type (section/lecture) --}}
                            {{-- <div class="text-sm text-gray-600">{{ $item->type }}</div> --}}
                        </div>
                        {{-- Assuming you have a way to determine if an item is editable --}}
                        @if (isset($item->editable) && $item->editable)
                            <a href="{{ route('apprenant.course.section.edit', $item->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-md transition duration-150 ease-in-out">
                                Edit
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No sections or lectures available for this course yet.</p>
        @endif
    </div>
@endsection 