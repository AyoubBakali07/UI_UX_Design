@extends('layouts.app')

@section('content')
<div x-data="{ tab: 'learner' }" class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
    <div class="w-full max-w-md space-y-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-blue-600 mb-2">Self-Learning Platform</h1>
            <p class="text-gray-600 mb-6">Log in to access your space</p>
        </div>
        <div class="flex mb-4 rounded-lg overflow-hidden shadow">
            <button
                class="w-1/2 py-2 text-center font-semibold transition"
                :class="tab === 'learner' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                @click="tab = 'learner'"
                type="button"
            >Learner</button>
            <button
                class="w-1/2 py-2 text-center font-semibold transition"
                :class="tab === 'instructor' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                @click="tab = 'instructor'"
                type="button"
            >Instructor</button>
        </div>
        <div class="bg-white shadow rounded-lg p-8">
            <template x-if="tab === 'learner'">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-800">Learner Area</h2>
                    <p class="text-gray-500 mb-6">Log in to access your courses and track your progress.</p>
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="role" value="learner">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                required autofocus autocomplete="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror"
                                placeholder="student@example.com">
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror"
                                placeholder="********">
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 block text-sm text-gray-900" for="remember">
                                Remember Me
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Login
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Don't have an account? Sign up</a>
                        </div>
                    </form>
                </div>
            </template>
            <template x-if="tab === 'instructor'">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-800">Instructor Area</h2>
                    <p class="text-gray-500 mb-6">Log in to access your instructor dashboard.</p>
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="role" value="instructor">
                        <div>
                            <label for="email_instructor" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email_instructor" type="email" name="email" value="{{ old('email') }}"
                                required autofocus autocomplete="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror"
                                placeholder="instructor@example.com">
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_instructor" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password_instructor" type="password" name="password" required autocomplete="current-password"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror"
                                placeholder="********">
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center">
                            <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" type="checkbox" name="remember" id="remember_instructor" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 block text-sm text-gray-900" for="remember_instructor">
                                Remember Me
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Login
                            </button>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Don't have an account? Sign up</a>
                        </div>
                    </form>
                </div>
            </template>
        </div>
    </div>
</div>
<!-- Alpine.js for tab switching -->
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
