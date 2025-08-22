@extends('layouts.app')
@section('main_class', 'min-h-screen p-0 m-0')
@section('content')
    <div class="flex w-full -mt-6">
        <!-- Dashboard Sidebar Component -->
        @include('components.dashboard-sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6 md:pl-0">
            <div class="min-h-screen py-8 px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center mb-8">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Product</h1>
                        <p class="text-gray-600">Add a new product to your catalog ✨</p>
                    </div>

                        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="p-8">
                                    <div class="mb-6">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                    </path>
                                                </svg>
                                                Product Name
                                            </span>
                                        </label>
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                                            placeholder="Enter product name" required>
                                        @error('name')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                                        </path>
                                                    </svg>
                                                    Price
                                                </span>
                                            </label>
                                            <div class="relative">
                                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">$</span>
                                                <input name="price" type="number" step="0.01" value="{{ old('price') }}"
                                                    class="w-full pl-8 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white"
                                                    placeholder="0.00" required>
                                            </div>
                                            @error('price')
                                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                        </path>
                                                    </svg>
                                                    Category
                                                </span>
                                            </label>
                                            <select name="category"
                                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white">
                                                <option value="">Select category</option>
                                                <option value="electronics" {{ old('category') == 'electronics' ? 'selected' : '' }}>Electronics
                                                </option>
                                                <option value="clothing" {{ old('category') == 'clothing' ? 'selected' : '' }}>Clothing</option>
                                                <option value="books" {{ old('category') == 'books' ? 'selected' : '' }}>Books</option>
                                                <option value="home" {{ old('category') == 'home' ? 'selected' : '' }}>Home & Garden</option>
                                                <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports & Outdoors
                                                </option>
                                                </select>
                                            @error('category')
                                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        </div>

                                    <div class="mb-6">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Product Image
                                            </span>
                                        </label>

                                        <div class="space-y-4">
                                            <div id="new-image-container" class="hidden">
                                                <div class="relative inline-block">
                                                    <img id="new-image-preview" class="h-32 w-32 object-cover rounded-xl border-2 border-green-200 shadow-md"
                                                        alt="New image preview">
                                                    <div
                                                        class="absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">
                                                        ✨
                                                    </div>
                                                </div>
                                                <p class="text-xs text-green-600 mt-2">New image preview</p>
                                            </div>

                                            <div class="relative">
                                                <input name="image" type="file" accept="image/*" class="hidden" id="image-upload">
                                                <label for="image-upload"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                            </path>
                                                        </svg>
                                                        <p class="mb-2 text-sm text-gray-500">
                                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                                        </p>
                                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        @error('image')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        </div>

                                    <div class="mb-8">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                Description
                                            </span>
                                        </label>
                                        <textarea name="description" rows="4"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50 hover:bg-white focus:bg-white resize-none"
                                            placeholder="Describe your product in detail...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    </div>

                                <div class="bg-gray-50 px-8 py-6 border-t border-gray-100">
                                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Review your details before creating
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('products.index') }}"
                                                class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white rounded-xl transition-colors duration-200 font-medium">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                                    </svg>
                                                    View All Products
                                                </span>
                                            </a>
                                            <a href="{{ route('products.index') }}"
                                                class="px-6 py-3 text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 font-medium">
                                                Cancel
                                            </a>
                                            <button type="submit"
                                                class="btn-animate px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-xl hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Create Product
                                                        </span>
                                                        </button>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        </div>
                        </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const imageUpload = document.getElementById('image-upload');
                                const newImageContainer = document.getElementById('new-image-container');
                                const newImagePreview = document.getElementById('new-image-preview');

                                imageUpload.addEventListener('change', function (e) {
                                    const file = e.target.files[0];
                                    if (!file) return;

                                    if (!file.type.startsWith('image/')) {
                                        alert('Please select a valid image file.');
                                        return;
                                    }

                                    if (file.size > 2 * 1024 * 1024) {
                                        alert('Image size must be less than 2MB.');
                                        return;
                                    }

                                    const reader = new FileReader();
                                    reader.onload = function (e) {
                                        newImagePreview.src = e.target.result;
                                        newImageContainer.classList.remove('hidden');
                                        newImageContainer.style.opacity = '0';
                                        newImageContainer.style.transform = 'scale(0.9)';
                                        setTimeout(() => {
                                            newImageContainer.style.transition = 'all 0.3s ease';
                                            newImageContainer.style.opacity = '1';
                                            newImageContainer.style.transform = 'scale(1)';
                                        }, 10);
                                    };
                                    reader.readAsDataURL(file);
                                });

                                const uploadArea = document.querySelector('label[for="image-upload"]');
                                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                                    uploadArea.addEventListener(eventName, preventDefaults, false);
                                });
                                function preventDefaults(e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                }
                                ['dragenter', 'dragover'].forEach(eventName => {
                                    uploadArea.addEventListener(eventName, () => uploadArea.classList.add('border-blue-400', 'bg-blue-50'), false);
                                });
                                ['dragleave', 'drop'].forEach(eventName => {
                                    uploadArea.addEventListener(eventName, () => uploadArea.classList.remove('border-blue-400', 'bg-blue-50'), false);
                                });
                                uploadArea.addEventListener('drop', (e) => {
                                    const dt = e.dataTransfer;
                                    const files = dt.files;
                                    if (files.length > 0) {
                                        imageUpload.files = files;
                                        imageUpload.dispatchEvent(new Event('change'));
                                    }
                                }, false);
                            });
                                </script>
@endsection


