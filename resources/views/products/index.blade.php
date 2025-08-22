@extends('layouts.app')
@section('main_class', 'min-h-screen p-0 m-0')
@section('content')
    <div class="w-full flex">

        @include('components.dashboard-sidebar')
        <!-- Main Content -->
        <div id="mainContent" class="flex-1 p-6 transition-all duration-300 ease-in-out">
            <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- Search Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                @if(request()->get('category'))
                                    {{ ucfirst(request()->get('category')) }} Products
                                @else
                                    Search Products
                                @endif
                            </h3>
                            @if(request()->get('category'))
                                <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-600 text-sm">
                                    ← View All Products
                                </a>
                            @endif
                            </div>
                            <div class="flex flex-col md:flex-row gap-4">
                                <!-- Search Input -->
                                <div class="flex-1">
                                    <input type="text" id="productsSearchInput" placeholder="Search products by name..."
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>

                                                        <!-- Category Filter -->
                                                        <div class="md:w-48">
                                                            <select id="productsCategoryFilter"
                                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                                <option value="">All Categories</option>
                                                                <option value="electronics" {{ request()->get('category') === 'electronics' ? 'selected' : '' }}>Electronics
                                                                </option>
                                                                <option value="clothing" {{ request()->get('category') === 'clothing' ? 'selected' : '' }}>Clothing</option>
                                                                <option value="books" {{ request()->get('category') === 'books' ? 'selected' : '' }}>Books</option>
                                                                <option value="home" {{ request()->get('category') === 'home' ? 'selected' : '' }}>Home & Garden</option>
                                                                <option value="sports" {{ request()->get('category') === 'sports' ? 'selected' : '' }}>Sports & Outdoors</option>
                                                            </select>
                                                        </div>


                        </div>
                        </div>

                    <!-- Products Grid -->
                    <div id="productsContainer">
                        @if($products->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                @foreach($products as $product)
                                    <a href="{{ route('products.show', $product) }}" class="block">
                                        <div
                                            class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                            @if($product->image_path)
                                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                                    class="w-full h-48 object-cover">
                                            @else
                                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="p-4">
                                                <h3 class="font-semibold text-gray-900 mb-2 truncate">{{ $product->name }}</h3>
                                                <div class="flex items-center justify-between mb-2">
                                                    <div class="text-lg font-bold text-green-600">
                                                        ${{ number_format($product->price, 2) }}</div>
                                                    @if($product->category)
                                                        <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">
                                                            {{ ucfirst($product->category) }}
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($product->description)
                                                    <p class="text-sm text-gray-600 line-clamp-2">
                                                        {{ Str::limit($product->description, 60) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="mt-8">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        @else
                            <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-200">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <p class="text-gray-500 text-lg mb-2">No products found</p>
                                <p class="text-gray-400 mb-4">Try adjusting your search or filters</p>
                                <a href="{{ route('products.create') }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 font-medium">
                                    Create Your First Product
                                </a>
                            </div>
                        @endif
                            </div>
                </div>
            </div>
            </div>
            </div>

    <script>
                    // Products Search Functionality
            let searchTimeout;
                    const productsSearchInput = document.getElementById('productsSearchInput');
                    const productsCategoryFilter = document.getElementById('productsCategoryFilter');

                    function performProductsSearch() {
                        const searchTerm = productsSearchInput.value.trim();
                        const category = productsCategoryFilter.value;

                    // Build the search URL
                    let searchUrl = window.location.pathname;
                    const params = new URLSearchParams();

                    if (searchTerm) params.append('search', searchTerm);
                    if (category) params.append('category', category);

                    // If there are search parameters, add them to URL
                    if (params.toString()) {
                        searchUrl += '?' + params.toString();
                }

                    // Reload page with search parameters (or no parameters for all products)
                    window.location.href = searchUrl;
                }



                    // Enter key press in search input
                    productsSearchInput.addEventListener('keypress', function (e) {
                        if (e.key === 'Enter') {
                            performProductsSearch();
                        }
                });

                    // Auto-search on category change
                    productsCategoryFilter.addEventListener('change', function () {
                        performProductsSearch();
                });

                    // Auto-search on input (with delay)
                    productsSearchInput.addEventListener('input', function () {
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(() => {
                            performProductsSearch();
                        }, 500);
                    });

                            // Set initial values from URL params
                            const urlParams = new URLSearchParams(window.location.search);
                            if (urlParams.get('search')) productsSearchInput.value = urlParams.get('search');
                            if (urlParams.get('category')) productsCategoryFilter.value = urlParams.get('category');


                 </script>
@endsection



