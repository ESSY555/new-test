@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Products</h1>
        @auth
            <a href="{{ route('products.create') }}" class="btn-animate bg-black text-white px-3 py-2 rounded">New</a>
        @endauth
    </div>

    <!-- Live Search Form -->
    <div class="mb-6">
        <div class="max-w-md relative">
            <input type="text" 
                   id="live-search" 
                   placeholder="Search products by name or category..." 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
            <div id="search-spinner" class="absolute right-3 top-1/2 transform -translate-y-1/2 hidden">
                <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($products as $product)
            <div class="product-card bg-white rounded shadow overflow-hidden cursor-pointer"
                onclick="window.location.href='{{ route('products.show', $product) }}'">
                @if ($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                        class="w-full h-40 object-cover">
                @endif
                <div class="p-3">
                    <div class="font-medium">{{ $product->name }}</div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-sm text-gray-600">${{ number_format($product->price, 2) }}</div>
                        @if($product->category)
                            <span class="px-2 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">
                                {{ ucfirst($product->category) }}
                            </span>
                        @endif
                    </div>
                </div>
                </div>
        @empty
            <div class="col-span-full text-center py-8">
                @if(isset($search) && $search)
                    <p class="text-gray-500 text-lg">No products found matching "{{ $search }}"</p>
                    <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-600 mt-2 inline-block">Clear search</a>
                @else
                    <p class="text-gray-500 text-lg">No products found.</p>
                @endif
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $products->links() }}</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('live-search');
            const productsGrid = document.querySelector('.grid');
            const searchSpinner = document.getElementById('search-spinner');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.trim();

                // Clear previous timeout
                clearTimeout(searchTimeout);

                // Show spinner
                searchSpinner.classList.remove('hidden');

                // Set new timeout for search (300ms delay)
                searchTimeout = setTimeout(() => {
                    performLiveSearch(searchTerm);
                }, 300);
            });

            function performLiveSearch(searchTerm) {
                // Create URL with search parameter
                const url = new URL(window.location);
                if (searchTerm) {
                    url.searchParams.set('search', searchTerm);
                } else {
                    url.searchParams.delete('search');
                }

                // Fetch search results
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Create a temporary div to parse the HTML
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;

                    // Extract the products grid from the response
                    const newProductsGrid = tempDiv.querySelector('.grid');
                    const newPagination = tempDiv.querySelector('.mt-4');

                    if (newProductsGrid) {
                        // Update the products grid
                        productsGrid.innerHTML = newProductsGrid.innerHTML;
                    }

                    if (newPagination) {
                        // Update pagination
                        const currentPagination = document.querySelector('.mt-4');
                        if (currentPagination) {
                            currentPagination.innerHTML = newPagination.innerHTML;
                        }
                    }

                    // Hide spinner
                    searchSpinner.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Search error:', error);
                    searchSpinner.classList.add('hidden');
                });
            }

            // Handle pagination clicks for search results
            document.addEventListener('click', function(e) {
                if (e.target.matches('.pagination a')) {
                    e.preventDefault();
                    const href = e.target.getAttribute('href');
                    const url = new URL(href);
                    const searchTerm = searchInput.value.trim();

                    if (searchTerm) {
                        url.searchParams.set('search', searchTerm);
                    }

                    // Fetch paginated results
                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;

                        const newProductsGrid = tempDiv.querySelector('.grid');
                        const newPagination = tempDiv.querySelector('.mt-4');

                        if (newProductsGrid) {
                            productsGrid.innerHTML = newProductsGrid.innerHTML;
                        }

                        if (newPagination) {
                            const currentPagination = document.querySelector('.mt-4');
                            if (currentPagination) {
                                currentPagination.innerHTML = newPagination.innerHTML;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Pagination error:', error);
                    });
                }
            });
        });
    </script>
@endsection


