@extends('layouts.app')

@section('content')
    <div class="grid gap-6 md:grid-cols-2">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Products</h2>
            <p class="text-sm text-gray-600 mb-3">Browse products or add a new one.</p>
            <div class="flex items-center gap-2">
                <a class="px-3 py-2 bg-black text-white rounded" href="{{ route('products.index') }}">View Products</a>
                @auth
                    <a class="px-3 py-2 bg-gray-100 rounded" href="{{ route('products.create') }}">Create Product</a>
                @endauth
            </div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Account</h2>
            @auth
                <p class="text-sm text-gray-600 mb-3">Logged in as <strong>{{ auth()->user()->name }}</strong>.</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn-animate px-3 py-2 bg-gray-100 rounded">Logout</button>
                </form>
            @else
                <div class="flex items-center gap-2">
                    <a class="px-3 py-2 bg-black text-white rounded" href="{{ route('login') }}">Login</a>
                    <a class="px-3 py-2 bg-gray-100 rounded" href="{{ route('register') }}">Register</a>
                </div>
                <p class="text-xs text-gray-500 mt-2">Seeder user: test@example.com / password</p>
            @endauth
        </div>
        <div class="bg-white p-6 rounded shadow md:col-span-2">
            <h2 class="text-lg font-semibold mb-2">About</h2>
            <p class="text-sm text-gray-700">
                Tiny Laravel CRUD: auth, products, validation, CSRF, uploads, Eloquent, migrations, factory, seeder.
            </p>
        </div>
    </div>
@endsection

 