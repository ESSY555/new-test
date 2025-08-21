@extends('layouts.app')

@section('main_class', 'min-h-screen p-0 m-0')
@section('content')
    <div style="background-image: url('{{ asset('/images/background.png') }}'); min-height: 100vh; background-size: cover; background-position: center;"
        class="flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-6 rounded shadow-lg">
            <h1 class="text-xl font-semibold mb-4">Register</h1>
            <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm">Name</label>
                    <input name="name" type="text" value="{{ old('name') }}" class="w-full border rounded p-2" required>
                    @error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm">Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" class="w-full border rounded p-2" required>
                    @error('email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm">Password</label>
                    <div class="relative">
                        <div class="flex items-center border rounded overflow-hidden bg-white">
                            <input id="register_password" name="password" type="password"
                                class="w-full p-2 rounded border-0 focus:outline-none focus:ring-0" required>
                        <button type="button"
                            class="btn-animate password-toggle px-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded cursor-pointer"
                            aria-label="Toggle password visibility" data-target="register_password">
                            <svg data-eye="open" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg data-eye="closed" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.8 21.8 0 0 1-3.16 4.19M1 1l22 22">
                                </path>
                            </svg>
                            </button>
                            </div>
                            </div>
                            @error('password')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm">Confirm Password</label>
                                <div class="relative">
                                    <div class="flex items-center border rounded overflow-hidden bg-white">
                                    <input id="register_password_confirmation" name="password_confirmation" type="password"
                                        class="w-full p-2 rounded border-0 focus:outline-none focus:ring-0" required>
                                    <button type="button"
                                        class="btn-animate password-toggle px-2 text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded cursor-pointer"
                                        aria-label="Toggle password visibility" data-target="register_password_confirmation">
                                        <svg data-eye="open" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                        <svg data-eye="closed" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.77 21.77 0 0 1 5.06-6.94M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.8 21.8 0 0 1-3.16 4.19M1 1l22 22">
                                            </path>
                                        </svg>
                                        </button>
                                        </div>
                                        </div>
                                        </div>
                        <button class="btn-animate w-full bg-black text-white px-4 py-2 rounded hover:bg-gray-800 cursor-pointer">Create
                            account</button>
                        </form>
                        <p class="text-sm mt-3">Already have an account? <a class="underline" href="{{ route('login') }}">Login</a></p>
                        </div>
                        </div>
@endsection


