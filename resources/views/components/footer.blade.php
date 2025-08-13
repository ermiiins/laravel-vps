@vite(['resources/css/app.css', 'resources/js/app.js'])
<footer class="bg-purple text-gold py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

            <!-- Column 1 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">Company</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">About Us</a></li>
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Contact</a></li>
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Column 2 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">Navigation</h3>
                <ul class="space-y-1">
                    <li><a href="/" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Home</a></li>
                    <li><a href="/services" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Services</a></li>
                </ul>
            </div>

            <!-- Column 3 -->
            <div>
                <h3 class="text-xl font-semibold mb-2">Follow Us</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Instagram</a></li>
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">Facebook</a></li>
                    <li><a href="#" class="hover:text-blue-500 px-3 py-2 rounded transition duration-200">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 text-center text-sm text-gold/80">
            &copy; {{ date('Y') }} Ermīns Novickis
        </div>
    </div>
</footer>