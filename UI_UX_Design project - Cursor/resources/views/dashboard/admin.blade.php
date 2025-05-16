@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Admin Dashboard</h1>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text-lg font-semibold text-gray-900 mb-2">Total Students</div>
                    <div class="text-3xl font-bold text-indigo-600">{{ $stats['total_students'] }}</div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text-lg font-semibold text-gray-900 mb-2">Total Courses</div>
                    <div class="text-3xl font-bold text-indigo-600">{{ $stats['total_courses'] }}</div>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text-lg font-semibold text-gray-900 mb-2">Total Modules</div>
                    <div class="text-3xl font-bold text-indigo-600">{{ $stats['total_modules'] }}</div>
                </div>
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Recent Registrations</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registered</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($stats['recent_registrations'] as $student)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->prenom }} {{ $student->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->telephone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $student->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 