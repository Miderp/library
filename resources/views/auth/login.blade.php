@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white relative">
    <!-- Logo -->
    <div class="absolute top-6 left-6 flex items-center gap-2">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-12">
        <span class="text-2xl font-bold text-gray-700">Miderp</span>
    </div>


    <!-- Login Container -->
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-[0_7px_29px_rgba(100,100,111,0.2)]">
        <h1 class="text-2xl font-semibold mb-4">Login to your account 👏</h1>



        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="block text-sm font-bold text-gray-800">Email:</label>
            <div class="relative mt-1 mb-4">
                <input type="email" name="email" placeholder="Your Email" required autofocus autocomplete="email"
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-at absolute top-3.5 right-3 text-2xl text-gray-600 pointer-events-none'></i>
            </div>

            <label for="password" class="block text-sm font-bold text-gray-800">Password:</label>
            <div class="relative mt-1 mb-4">
                <input type="password" name="password" required placeholder="Your Password"
                    class="w-full h-12 px-5 pr-10 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-800 font-medium">
                <i class='bx bx-lock-alt absolute top-3.5 right-3 text-2xl text-gray-600 pointer-events-none'></i>
            </div>

            <button type="submit"
                class="w-full mt-6 bg-indigo-600 text-white font-extrabold text-lg py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                Login
            </button>

            <div class="flex justify-between mt-6 text-indigo-600 font-semibold text-sm">
                <a href="{{ route('password.request') }}" class="hover:underline underline-offset-4">Reset Password</a>
                <a href="{{ route('register') }}" class="hover:underline underline-offset-4">Don't have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection
