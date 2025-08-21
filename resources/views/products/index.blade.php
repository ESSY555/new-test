@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-semibold">Products</h1>
    @auth
        <a href="{{ route('products.create') }}" class="bg-black text-white px-3 py-2 rounded">New</a>
    @endauth
    </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @forelse ($products as $product)
        <a href="{{ route('products.show', $product) }}" class="block bg-white rounded shadow overflow-hidden">
            @if ($product->image_path)
                <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
            @endif
            <div class="p-3">
                <div class="font-medium">{{ $product->name }}</div>
                <div class="text-sm text-gray-600">${{ number_format($product->price, 2) }}</div>
            </div>
        </a>
    @empty
        <p>No products found.</p>
    @endforelse
</div>

<div class="mt-4">{{ $products->links() }}</div>
@endsection


