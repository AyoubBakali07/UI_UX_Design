@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 rounded-lg shadow-md bg-white">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Register</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                <input id="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autofocus>
                
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required>
                
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" name="password" required>
                
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password-confirm" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" name="password_confirmation" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-white font-semibold bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Register') }}
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:text-blue-600">
                    Log in
                </a>
            </p>
        </div>
    </div>
</div>
@endsection