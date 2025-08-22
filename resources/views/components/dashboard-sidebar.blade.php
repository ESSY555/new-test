<!-- Dashboard Sidebar Component -->
<div class="w-64 bg-white shadow-lg border-r border-gray-200 min-h-screen">
    <div class="p-6">
        <!-- Sidebar Header -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2 px-3">Dashboard</h2>
            <p class="text-sm text-gray-600 px-3">Overview and quick actions</p>
        </div>

        <!-- Quick Actions -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-700 mb-3 px-3">Quick Actions</h3>
            <a href="{{ route('products.create') }}" 
               class="w-full bg-blue-500 hover:bg-blue-600 text-white mx-3 px-2 py-2 rounded-lg transition-colors duration-200 font-medium text-center block mb-2 ">
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Product
                </span>
            </a>
            <a href="{{ route('products.index') }}" 
               class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 mx-2 px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-center block mb-2">
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    View All Products
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

        <!-- Dashboard Stats -->
        <div class="mb-6">
            <h3 class="text-sm font-medium text-gray-700 mb-3 px-3">Overview</h3>
            <div class="space-y-3">
                @if(isset($totalProducts))
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <div class="text-2xl font-bold text-blue-600">{{ $totalProducts }}</div>
                        <div class="text-xs text-blue-600">Total Products</div>
                    </div>
                @endif
                @if(isset($userProducts))
                    <div class="bg-green-50 p-3 rounded-lg">
                        <div class="text-2xl font-bold text-green-600">{{ $userProducts }}</div>
                        <div class="text-xs text-green-600">Your Products</div>
                    </div>
                @endif
                @if(isset($categories) && $categories->count() > 0)
                    <div class="bg-purple-50 p-3 rounded-lg">
                        <div class="text-2xl font-bold text-purple-600">{{ $categories->count() }}</div>
                        <div class="text-xs text-purple-600">Categories</div>
                    </div>
                @endif
            </div>
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

        <!-- Category Distribution -->
        @if(isset($categories) && $categories->count() > 0)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Top Categories</h3>
                <div class="space-y-2">
                    @foreach($categories->take(5) as $category)
                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-700">{{ ucfirst($category->category) }}</span>
                            <span class="text-xs font-medium text-gray-500">{{ $category->count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Recent Activity -->
        @if(isset($recentProducts) && $recentProducts->count() > 0)
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-3">Recent Activity</h3>
                <div class="space-y-2">
                    @foreach($recentProducts->take(3) as $product)
                        <div class="p-2 bg-gray-50 rounded-lg">
                            <div class="text-sm font-medium text-gray-800 truncate">{{ $product->name }}</div>
                            <div class="text-xs text-gray-500">{{ $product->created_at->diffForHumans() }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Help -->
        <div class="border-t border-gray-200 pt-4">
            <h3 class="text-sm font-medium text-gray-700 mb-2">Quick Tips</h3>
            <div class="text-xs text-gray-400">
                <p>• Use search to find products quickly</p>
                <p>• Filter by category for better results</p>
                <p>• Click on any product to view details</p>
                <p>• Create new products from the dashboard</p>
            </div>
        </div>
    </div>
</div>

<script>
// Dashboard Sidebar Category Filtering
document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-filter-btn');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active state for all buttons
            categoryButtons.forEach(btn => {
                btn.classList.remove('bg-blue-50', 'text-blue-700', 'font-medium');
                btn.classList.add('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-800');
            });
            
            // Set active state for clicked button
            this.classList.remove('text-gray-600', 'hover:bg-gray-50', 'hover:text-gray-800');
            this.classList.add('bg-blue-50', 'text-blue-700', 'font-medium');
            
            // Navigate to products page with category filter
            if (category) {
                window.location.href = '{{ route("products.index") }}?category=' + category;
            } else {
                window.location.href = '{{ route("products.index") }}';
            }
        });
    });
});
</script>
