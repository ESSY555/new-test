@extends('layouts.app')

@section('main_class', 'min-h-screen bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100')
@section('content')
    <div class="min-h-screen py-8 px-4 relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-32 h-32 bg-blue-400 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-purple-400 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/4 w-20 h-20 bg-indigo-400 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s;"></div>
        </div>

        <div class="max-w-4xl mx-auto relative z-10">
            <!-- Product Details Card -->
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                @else
                        <div class="bg-gray-100 h-64 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-lg">No image available</p>
                            </div>
                        </div>
                    @endif

                    <div class="p-8">
                        <!-- Product Header -->
                        <div class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            <div class="flex items-center gap-4 mb-3">
                                <div class="text-2xl font-semibold text-green-600">${{ number_format($product->price, 2) }}</div>
                                @if($product->category)
                                    <span class="px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full">
                                        {{ ucfirst($product->category) }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Product Description -->
                        @if ($product->description)
                            <div class="mb-8">
                                <h2 class="text-lg font-semibold text-gray-700 mb-3">Description</h2>
                                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 border-t border-gray-100">
                            @auth
                                <a href="{{ route('products.edit', $product) }}"
                                    class="flex-1 px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition-colors duration-200 font-semibold text-center">
                                    <span class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit Product
                                    </span>
                                </a>

                                <form method="POST" action="{{ route('products.destroy', $product) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')"
                                    class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full px-8 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl transition-colors duration-200 font-semibold">
                                        <span class="flex items-center justify-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Delete Product
                                        </span>
                                    </button>
                                </form>
                            @else
                                <div class="text-center text-gray-500">
                                    <p>Please log in to edit or delete this product.</p>
                                </div>
                            @endauth
                        </div>
                    </div>
                    </div>
                    </div>
    </div>
@endsection


