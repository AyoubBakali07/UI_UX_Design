@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="mt-2 text-gray-600">Track your progress and continue learning.</p>
    </div>

    <!-- Progress Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-50 rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-600">Courses in Progress</p>
                    <h2 class="text-3xl font-bold text-blue-900">{{ $inProgressCount ?? 0 }}</h2>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-green-50 rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-600">Completed Courses</p>
                    <h2 class="text-3xl font-bold text-green-900">{{ $completedCount ?? 0 }}</h2>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-600">Total Achievements</p>
                    <h2 class="text-3xl font-bold text-purple-900">{{ $achievementsCount ?? 0 }}</h2>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Current Courses -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Current Courses</h2>
        @if(isset($currentCourses) && $currentCourses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($currentCourses as $course)
                    <div class="border rounded-lg overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                            @if($course->thumbnail)
                                <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}" class="object-cover">
                            @else
                                <div class="flex items-center justify-center h-full bg-gray-200">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">{{ $course->title }}</h3>
                            <div class="mt-2">
                                <div class="flex items-center">
                                    <div class="flex-1">
                                        <div class="h-2 bg-gray-200 rounded-full">
                                            <div class="h-2 bg-blue-600 rounded-full" style="width: {{ $course->progress }}%"></div>
                                        </div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">{{ $course->progress }}%</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('courses.show', $course->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                    Continue Learning
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No courses yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by enrolling in a course.</p>
                <div class="mt-6">
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Browse Courses
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Recent Achievements -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Recent Achievements</h2>
        @if(isset($recentAchievements) && $recentAchievements->count() > 0)
            <div class="space-y-4">
                @foreach($recentAchievements as $achievement)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                        <div class="flex-shrink-0">
                            <div class="bg-purple-100 rounded-full p-2">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $achievement->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $achievement->description }}</p>
                            <p class="text-xs text-gray-500 mt-1">Earned {{ $achievement->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No achievements yet. Keep learning to earn achievements!</p>
        @endif
    </div>
</div>
@endsection 