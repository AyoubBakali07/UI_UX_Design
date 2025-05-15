@props([
    'course',
    'showProgress' => true,
    'showActions' => true
])

<div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow duration-300">
    <div class="aspect-w-16 aspect-h-9 bg-gray-100">
        @if($course->thumbnail)
            <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}" class="object-cover w-full h-full">
        @else
            <div class="flex items-center justify-center h-full bg-gray-200">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        @endif
    </div>

    <div class="p-4">
        <div class="flex items-start justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">{{ $course->title }}</h3>
                <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $course->description }}</p>
            </div>
            @if($course->is_featured)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    Featured
                </span>
            @endif
        </div>

        <div class="mt-4 flex items-center text-sm text-gray-500">
            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ $course->duration }} hours
        </div>

        <div class="mt-4 flex items-center text-sm text-gray-500">
            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            {{ $course->enrolled_count ?? 0 }} students enrolled
        </div>

        @if($showProgress && isset($course->progress))
            <div class="mt-4">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Progress</span>
                    <span class="font-medium text-blue-600">{{ $course->progress }}%</span>
                </div>
                <div class="mt-2 relative">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-200">
                        <div style="width: {{ $course->progress }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600 transition-all duration-300"></div>
                    </div>
                </div>
            </div>
        @endif

        @if($showActions)
            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <span class="text-lg font-bold text-gray-900">
                        @if($course->price > 0)
                            ${{ number_format($course->price, 2) }}
                        @else
                            Free
                        @endif
                    </span>
                    @if($course->original_price > $course->price)
                        <span class="text-sm text-gray-500 line-through">${{ number_format($course->original_price, 2) }}</span>
                    @endif
                </div>
                
                @if(isset($course->enrolled) && $course->enrolled)
                    <a href="{{ route('courses.learn', $course->id) }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Continue Learning
                        <svg class="ml-2 -mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @else
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enroll Now
                        </button>
                    </form>
                @endif
            </div>
        @endif
    </div>
</div> 