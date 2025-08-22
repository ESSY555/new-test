@extends('layouts.app')
@section('main_class', 'min-h-screen p-0 m-0')
@section('content')
    <div class="flex w-full -mt-6">
        <!-- Dashboard Sidebar Component -->
        @include('components.dashboard-sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6 md:pl-0">
            <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
                <!-- Header -->
                <div class="bg-white shadow-sm border-b border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center py-4 sm:py-6 space-y-4 sm:space-y-0">
                            <div class="text-center sm:text-left">
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Edit Product</h1>
                                <p class="text-gray-600 mt-1 text-sm sm:text-base">Update product information</p>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 justify-center sm:justify-end">
                                <a href="{{ route('dashboard') }}"
                                    class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 sm:px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm sm:text-base text-center">
                                    <span class="flex items-center justify-center sm:justify-start">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                        </svg>
                                        Dashboard
                                    </span>
                                    </a>
                                    <a href="{{ route('products.show', $product) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 sm:px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm sm:text-base text-center">
                                    <span class="flex items-center justify-center sm:justify-start">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        View Product
                                    </span>
                                </a>
                                <a href="{{ route('products.index') }}"
                                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 sm:px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm sm:text-base text-center">
                                    View All Products
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>

                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Product Name -->
                                <div class="md:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name
                                        *</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                        placeholder="Enter product name">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                        </div>

                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required
                                            class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror"
                                            placeholder="0.00">
                                        </div>
                                        @error('price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                            </div>

                                <!-- Category -->
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                                    <select id="category" name="category"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                                        <option value="">Select a category</option>
                                        <option value="electronics" {{ old('category', $product->category) == 'electronics' ? 'selected' : '' }}>Electronics
                                        </option>
                                        <option value="clothing" {{ old('category', $product->category) == 'clothing' ? 'selected' : '' }}>Clothing</option>
                                        <option value="books" {{ old('category', $product->category) == 'books' ? 'selected' : '' }}>Books</option>
                                        <option value="home" {{ old('category', $product->category) == 'home' ? 'selected' : '' }}>Home & Garden</option>
                                        <option value="sports" {{ old('category', $product->category) == 'sports' ? 'selected' : '' }}>Sports & Outdoors
                                        </option>
                                        </select>
                                    @error('category')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                <!-- Product Image -->
                                <div class="md:col-span-2">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product
                                        Image</label>

                                    @if($product->image_path)
                                        <div class="mb-4">
                                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                                class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                                            </div>
                                    @endif

                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image') border-red-500 @enderror">
                                    <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image. PNG, JPG, GIF
                                        up to 10MB</p>
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                        placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                        </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3 mt-8 pt-6 border-t border-gray-200">
                                <a href="{{ route('products.index') }}"
                                    class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200 font-medium">
                                    Update Product
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection


