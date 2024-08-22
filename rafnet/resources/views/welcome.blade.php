<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                RAFNET
                <nav class="ml-6">
                    <ul class="flex space-x-4">
                        <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-500">Home</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-gray-700 hover:text-blue-500">Contact Us</a></li>
                        <li><a href="{{ url('/login') }}" class="text-gray-700 hover:text-blue-500">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="text-gray-700 hover:text-blue-500">Sign Up</a></li>
                    </ul>
                </nav>
            </div>
            <div class="text-sm text-gray-600">
                Call Us: <span class="text-gray-800">+254 123 456 789</span>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero bg-cover bg-center h-96" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div class="container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-4xl font-bold">Your Comfort is Our Priority</h1>
            <p class="text-lg mt-4">Providing top-quality air conditioning services across East Africa.</p>
            <a href="{{ url('/contact') }}" class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Get a Quote</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services py-12 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Installation</h3>
                    <p>We provide expert installation of air conditioning systems.</p>
                    <a href="{{ url('/services/installation') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">Learn More</a>
                </div>
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Maintenance</h3>
                    <p>Regular maintenance to keep your systems running efficiently.</p>
                    <a href="{{ url('/services/maintenance') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">Learn More</a>
                </div>
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Repair</h3>
                    <p>Quick and reliable repair services when you need them.</p>
                    <a href="{{ url('/services/repair') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Air Conditioners</h3>
                    <p>High-quality air conditioning units for all needs.</p>
                    <a href="{{ url('/products/air-conditioners') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">View Products</a>
                </div>
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">HVAC Systems</h3>
                    <p>Advanced HVAC systems for large-scale applications.</p>
                    <a href="{{ url('/products/hvac-systems') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">View Products</a>
                </div>
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <h3 class="text-xl font-semibold mb-4">Accessories</h3>
                    <p>All the accessories you need for your AC systems.</p>
                    <a href="{{ url('/products/accessories') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">View Products</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us py-12 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">About Refnet</h2>
            <p class="text-center max-w-3xl mx-auto">Refnet Air Conditioning (E.A) Ltd is dedicated to providing top-notch air conditioning solutions across East Africa. With years of experience, we ensure quality, reliability, and efficiency in all our services.</p>
            <div class="text-center mt-6">
                <a href="{{ url('/about-us') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Read More</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Clients Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <p class="italic">"Refnet installed our AC system, and we couldn't be happier with the service. Highly recommend!"</p>
                    <p class="mt-4 font-semibold">- John Doe, Nairobi</p>
                </div>
                <div class="card bg-white shadow-lg p-6 rounded-lg text-center">
                    <p class="italic">"Their maintenance service is top-notch, always ensuring our systems run smoothly."</p>
                    <p class="mt-4 font-semibold">- Jane Smith, Mombasa</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <div class="footer-links mb-4">
                <a href="{{ url('/') }}" class="text-gray-400 hover:text-white">Home</a> |
                <a href="{{ url('/about-us') }}" class="text-gray-400 hover:text-white">About Us</a> |
                <a href="{{ url('/services') }}" class="text-gray-400 hover:text-white">Services</a> |
                <a href="{{ url('/products') }}" class="text-gray-400 hover:text-white">Products</a> |
                <a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white">Contact Us</a>
            </div>
            <div class="social-media mb-4">
                <a href="#" class="text-gray-400 hover:text-white">Facebook</a> |
                <a href="#" class="text-gray-400 hover:text-white">Twitter</a> |
                <a href="#" class="text-gray-400 hover:text-white">LinkedIn</a>
            </div>
            <div class="contact-info mb-4">
                <p>Email: info@refnet.co.ke | Phone: +254 123 456 789</p>
            </div>
            <p>&copy; 2024 Refnet Air Conditioning (E.A) Ltd. All rights reserved.</p>
        </div>
    </footer>

