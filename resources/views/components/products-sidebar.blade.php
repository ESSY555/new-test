<!-- Products Sidebar Component -->
<div class="w-64 bg-white shadow-lg border-r border-gray-200 min-h-screen">
    <div class="p-6">
        <!-- Sidebar Header -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2 px-3">Products</h2>
            <p class="text-sm text-gray-600 px-3">Browse and discover products</p>
        </div>

        <!-- Quick Actions -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-700 mb-3 px-3">Quick Actions</h3>
            <a href="{{ route('products.create') }}" 
               class="w-full bg-blue-500 hover:bg-blue-600 text-white mx-3 px-2 py-2 rounded-lg transition-colors duration-200 font-medium text-center block mb-2">
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Product
                </span>
            </a>
            <a href="{{ route('dashboard') }}" 
               class="w-full bg-indigo-500 hover:bg-indigo-600 text-white mx-2 px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-center block">
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Dashboard
                </span>
            </a>
        </div>

        <!-- Category Navigation -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-700 mb-3 px-3">Browse by Category</h3>
            <div class="space-y-2">
                <button data-category="" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ !(request()->get('category')) ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    All Categories
                </button>
                <button data-category="electronics" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ request()->get('category') === 'electronics' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    Electronics
                </button>
                <button data-category="clothing" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ request()->get('category') === 'clothing' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    Clothing
                </button>
                <button data-category="books" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ request()->get('category') === 'books' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    Books
                </button>
                <button data-category="home" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ request()->get('category') === 'home' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    Home & Garden
                </button>
                <button data-category="sports" 
                   class="category-filter-btn w-full text-left block px-3 py-2 text-sm rounded-md transition-colors duration-200 {{ request()->get('category') === 'sports' ? 'bg-blue-50 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800' }}">
                    Sports & Outdoors
                </button>
            </div>
        </div>

        <!-- Search Tips -->
        <div class="border-t border-gray-200 pt-4">
            <h3 class="text-sm font-medium text-gray-700 mb-2 px-3">Search Tips</h3>
            <div class="text-xs text-gray-400 px-3">
                <p>• Use the search bar to find specific products</p>
                <p>• Filter by category for better results</p>
                <p>• Click on any product to view details</p>
                <p>• Create new products from the dashboard</p>
            </div>
        </div>
    </div>
</div>
