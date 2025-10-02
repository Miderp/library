@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white relative">
    <!-- Logo -->
    <div class="absolute top-6 left-6 flex items-center gap-2">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12">
        <span class="text-2xl font-bold text-gray-700">Miderp</span>
    </div>

    <!-- Register Container -->
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-[0_7px_29px_rgba(100,100,111,0.2)]">
        <h1 class="text-2xl font-semibold mb-4">Create your account 🎉</h1>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label for="name" class="block text-sm font-bold text-gray-800 mt-3">Name:</label>
            <div class="relative mt-1 mb-3">
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-user absolute top-3.5 right-3 text-2xl text-gray-600'></i>
            </div>
            @error('name')
                <p class="text-sm text-red-600 -mt-2 mb-2">{{ $message }}</p>
            @enderror

            <!-- Email -->
            <label for="email" class="block text-sm font-bold text-gray-800 mt-3">Email:</label>
            <div class="relative mt-1 mb-3">
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-at absolute top-3.5 right-3 text-2xl text-gray-600'></i>
            </div>
            @error('email')
                <p class="text-sm text-red-600 -mt-2 mb-2">{{ $message }}</p>
            @enderror

            <!-- Password -->
            <label for="password" class="block text-sm font-bold text-gray-800 mt-3">Password:</label>
            <div class="relative mt-1 mb-3">
                <input type="password" name="password" required
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-lock-alt absolute top-3.5 right-3 text-2xl text-gray-600'></i>
            </div>
            @error('password')
                <p class="text-sm text-red-600 -mt-2 mb-2">{{ $message }}</p>
            @enderror

            <!-- Confirm Password -->
            <label for="password_confirmation" class="block text-sm font-bold text-gray-800 mt-3">Confirm Password:</label>
            <div class="relative mt-1 mb-5">
                <input type="password" name="password_confirmation" required
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-lock-alt absolute top-3.5 right-3 text-2xl text-gray-600'></i>
            </div>

            <button type="submit"
                class="w-full mt-2 bg-indigo-600 text-white font-extrabold text-lg py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                Register
            </button>

            <div class="text-sm text-center text-gray-700 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
