@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Mes Cours</h2>
        {{-- Wrapper for horizontal scrolling --}}
        <div class="overflow-x-auto">
            {{-- Flex container for course cards --}}
            <div class="flex space-x-4 pb-2 flex-nowrap">
                @foreach ($courses as $course)
                    {{-- Individual course card item --}}
                    <div class="min-w-[220px] bg-white rounded-lg shadow p-4 flex-shrink-0">
                        <div class="font-bold text-lg mb-2">{{ $course['name'] }}</div>
                        <div class="text-gray-500 mb-2">Début: {{ $course['start'] }}</div>
                        <div class="mb-2">
                            <span class="text-blue-600 font-semibold">{{ $course['progress'] }}%</span>
                        </div>
                        <div class="h-2.5 bg-gray-200 rounded-full">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                        </div>
                        <a href="{{ url('/Apprenant/course/' . urlencode($course['name']) . '/sections') }}"
                           class="mt-4 w-full block text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                            Enroll Now
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <h1 class="text-2xl font-bold mb-4">Mes Informations</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Course Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Start
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Progress
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $course['name'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $course['start'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $course['progress'] }}%</div>
                        <div class="mt-2 h-2.5 bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection