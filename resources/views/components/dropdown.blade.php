{{-- resources/views/components/category-dropdown.blade.php --}}
<div class="relative inline-block text-left" x-data="categoryDropdown()">
    <div>
        <button @click="open = !open" type="button" 
                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" 
                id="menu-button" 
                aria-expanded="true" 
                aria-haspopup="true">
            <i class="fas fa-list text-gray-500"></i>
            <span x-text="selectedCategory || 'Categories'"></span>
            <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         @click.away="open = false"
         class="absolute left-0 z-10 mt-2 w-72 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" 
         role="menu" 
         aria-orientation="vertical" 
         aria-labelledby="menu-button" 
         tabindex="-1">
        
        <div class="py-1 max-h-96 overflow-y-auto" role="none">
            <template x-for="category in categories" :key="category.id">
                <div>
                    <!-- Parent Category -->
                    <div class="px-4 py-2 text-sm font-semibold text-gray-900 bg-gray-50 border-b border-gray-200">
                        <a :href="'/categories/' + category.slug" 
                           class="flex items-start hover:text-blue-600 transition-colors"
                           @click="selectCategory(category.name); open = false">
                            <i :class="category.icon || 'fas fa-folder'" class="mr-2 mt-0.5"></i>
                            <span x-text="category.name"></span>
                        </a>
                    </div>
                    
                    <!-- Child Categories -->
                    <template x-if="category.children && category.children.length > 0">
                        <div class="pl-4">
                            <template x-for="child in category.children" :key="child.id">
                                <a :href="'/categories/' + child.slug" 
                                   class="flex items-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors"
                                   @click="selectCategory(child.name); open = false">
                                    <i :class="child.icon || 'fas fa-tag'" class="mr-2 mt-0.5 text-gray-400"></i>
                                    <span x-text="child.name"></span>
                                </a>
                            </template>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
function categoryDropdown() {
    return {
        open: false,
        selectedCategory: '',
        categories: @json($categories ?? []),
        
        init() {
            // Load categories if not provided
            if (this.categories.length === 0) {
                this.loadCategories();
            }
        },
        
        async loadCategories() {
            try {
                const response = await fetch('/api/categories');
                this.categories = await response.json();
            } catch (error) {
                console.error('Error loading categories:', error);
            }
        },
        
        selectCategory(name) {
            this.selectedCategory = name;
        }
    }
}
</script>