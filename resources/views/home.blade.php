<x-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-black font-semibold text-xl leading-tight">
                {{ __('Welcome to BALTGRAN') }}
            </h2>
            
            <!-- Category Dropdown -->
            <x-category-dropdown />
        </div>
    </x-slot>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
        <!-- Column 1: Construction -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-hard-hat text-4xl text-blue-600"></i>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Construction</h3>
            <p class="text-gray-600 text-center">
                Professional construction services with quality materials and skilled craftsmanship.
            </p>
        </div>

        <!-- Column 2: Woodworking -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-hammer text-4xl text-amber-600"></i>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Woodworking</h3>
            <p class="text-gray-600 text-center">
                Custom woodworking solutions from furniture to large-scale wooden structures.
            </p>
        </div>

        <!-- Column 3: Wood Pellets -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-fire text-4xl text-red-600"></i>
            </div>
            <h3 class="text-xl font-bold text-center mb-2">Wood Pellets</h3>
            <p class="text-gray-600 text-center">
                Eco-friendly wood pellets for efficient heating solutions.
            </p>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 p-4">
        <!-- Column 1: Location -->
        <a href="#" class="bg-gray-400 hover:bg-gray-300 transition duration-200 group relative h-80 max-w-xs mx-auto rounded-lg shadow-lg">
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <i class="fas fa-globe text-3xl text-black mb-2"></i>
                <h3 class="text-black font-bold text-xl mb-1">Location</h3>
                <p class="text-black text-sm">
                    Based in Ķekavas novads. Free delivery to nearby cities around Daugmale.
                </p>
            </div>
        </a>

        <!-- Column 2: Woodworking -->
        <a href="#" class="bg-gray-400 hover:bg-gray-300 transition duration-200 group relative h-80 max-w-xs mx-auto rounded-lg shadow-lg">
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <i class="fas fa-hammer text-3xl text-black mb-2"></i>
                <h3 class="text-black font-bold text-xl mb-1">Woodworking</h3>
                <p class="text-black text-sm">
                    Skilled woodcraft with years of experience. From custom furniture to large-scale projects.
                </p>
            </div>
        </a>

        <!-- Column 3: Wood Pellets -->
        <a href="#" class="bg-gray-400 hover:bg-gray-300 transition duration-200 group relative h-80 max-w-xs mx-auto rounded-lg shadow-lg">
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">
                <i class="fas fa-fire text-3xl text-black mb-2"></i>
                <h3 class="text-black font-bold text-xl mb-1">Wood Pellets</h3>
                <p class="text-black text-sm">
                    Efficient and eco-friendly pellets for heating. Clean burn and consistent quality.
                </p>
            </div>
        </a>
    </section>
</x-layout>