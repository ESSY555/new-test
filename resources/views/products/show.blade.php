@extends('layouts.app')
@section('main_class', 'min-h-screen p-0 m-0')
@section('content')
    <div class="w-full flex">

        @include('components.dashboard-sidebar')
        <!-- Main Content -->
        <div id="mainContent" class="flex-1 p-6 transition-all duration-300 ease-in-out">
            <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 relative overflow-hidden">
                <!-- Background Decorative Elements -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div
                        class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full opacity-10 blur-3xl">
                    </div>
                    <div
                        class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-green-400 to-blue-500 rounded-full opacity-10 blur-3xl">
                    </div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-5 blur-3xl">
                    </div>
                </div>

                <!-- Header -->
                <div class="bg-white shadow-sm border-b border-gray-200 relative z-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 sm:py-6 space-y-3 sm:space-y-0">
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 break-words">{{ $product->name }}</h1>
                                <p class="text-gray-600 mt-1">Product Details</p>
                            </div>
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                                <a href="{{ route('dashboard') }}"
                                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-center">
                                    <span class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                        </svg>
                                        Dashboard
                                    </span>
                                </a>
                                <a href="{{ route('products.index') }}"
                                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-center">
                                    View All Products
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 relative z-10">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-4 sm:p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                            <!-- Product Image -->
                            <div class="lg:col-span-1 space-y-4">
                                @if($product->image_path)
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                            class="w-full h-48 sm:h-64 object-cover rounded-xl shadow-lg">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                    </div>
                                @else
                                    <div
                                        class="w-full h-48 sm:h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="w-16 sm:w-24 h-16 sm:h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Information -->
                            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                                <div>
                                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2 break-words">{{ $product->name }}</h2>
                                    <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4 mb-4">
                                        <div class="text-2xl sm:text-3xl font-bold text-green-600">
                                            ${{ number_format($product->price, 2) }}
                                        </div>
                                        @if($product->category)
                                            <span class="px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full w-fit">
                                                {{ ucfirst($product->category) }}
                                            </span>
                                        @endif
                                    </div>
                                    @if($product->description)
                                        <p class="text-gray-600 text-base sm:text-lg leading-relaxed">{{ $product->description }}</p>
                                    @else
                                        <p class="text-gray-500 italic">No description available</p>
                                    @endif
                                </div>

                                <!-- Product Meta -->
                                <div class="space-y-3">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Created {{ $product->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if($product->updated_at != $product->created_at)
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                            <span>Updated {{ $product->updated_at->diffForHumans() }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="w-full sm:w-1/2 bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium text-center">
                                        Edit Product
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="w-full sm:w-1/2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg transition-colors duration-200 font-medium">
                                            Delete Product
                                        </button>
                                        </form>
                                        </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
    </div>
@endsection


