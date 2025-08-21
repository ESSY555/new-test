@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded shadow overflow-hidden">
            @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
            @endif
                <div class="p-4">
                    <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
                    <div class="text-gray-600 mt-1">${{ number_format($product->price, 2) }}</div>
                    @if ($product->description)
                        <p class="mt-3">{{ $product->description }}</p>
                    @endif
                    <div class="mt-4 flex items-center gap-2">
                    <a class="btn-animate px-3 py-2 bg-gray-100 rounded" href="{{ route('products.index') }}">Back</a>
                    @auth
                        <a class="btn-animate px-3 py-2 bg-black text-white rounded" href="{{ route('products.edit', $product) }}">Edit</a>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Delete product?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-animate px-3 py-2 bg-red-600 text-white rounded">Delete</button>
                            </form>
                    @endauth
                            </div>
                            </div>
                            </div>
                            </div>
@endsection


