<script setup>
    import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    categorie_count: Number,
    user_count: Number,
    user_online: Number,
});
</script>

<template>
    <Head title="Welcome" />
        <div class="snap-y snap-mandatory overflow-scroll h-screen">
            <main class="snap-center py-8 h-screen">
                <div class="mx-auto flex items-center h-full justify-center text-center">
                    <div>
                        <h1 class="text-6xl font-bold text-gray-800 mb-4">Welcome to ExoTime!</h1>
                        <h2 class="text-2xl text-gray-700 mb-8">A community platform for exchanging skills and services</h2>
                        <div class="flex gap-6 justify-between w-1/2 mx-auto">
                        <Link :href="route('login')" class="bg-blue-400 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg">Login Now</Link>
                        <Link :href="route('register')" class="bg-blue-400 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg">Sign Up Now</Link>
                    </div>
                    </div>
                </div>
            </main>
            <section class="snap-center py-8 bg-gray-500 h-screen">
                <div class="container mx-auto flex flex-wrap items-center h-full">
                    <div class="w-full md:w-1/2 p-4">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Connect with others in your community</h2>
                        <p class="text-gray-700 mb-4">ExoTime is a timebank system that connects you with others in your city or neighborhood. Whether you need help with a task or want to offer your skills to others, ExoTime is the perfect platform for exchanging services and building relationships with those around you.</p>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <img src="https://via.placeholder.com/800x600" alt="Placeholder image" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
            </section>
            <section class="snap-center py-8 bg-gray-100 h-screen">
                <div class="container mx-auto flex flex-wrap items-center h-full">
                    <div class="w-full md:w-1/2 p-4">
                        <img src="https://via.placeholder.com/800x600" alt="Placeholder image" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Exchange skills and services with the currency of time</h2>
                        <p class="text-gray-700 mb-4">ExoTime uses a unique currency system based on time. All users have an account with a balance of hours, and when they offer or receive a service, they are paid or charged in hours for their time. This allows for a more equitable exchange of skills and services within the community, and encourages users to help each other out and build strong connections with those around them.</p>
                    </div>
                </div>
            </section>

            <footer class="snap-start py-8 bg-gray-50 px-4">
                <div class="flex flex-col items-center justify-between max-w-4xl mx-auto">
                    <div class="flex mb-6">
                        <div class="h-12 w-12 bg-gray-700 rounded-full"></div>
                    </div>
                    <div class="flex mb-6">
                        <p class="text-gray-400 mt-2">A short description of the company or website and its mission or values.</p>
                    </div>
                    <div class="flex justify-between items-center mb-6">
                        <a class="text-gray-400 hover:text-white mr-4" href="/">Home</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/about">About</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/blog">Blog</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/contact">Contact</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/privacy">Privacy</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/terms">Terms</a>
                        <a class="text-gray-400 hover:text-white mr-4" href="/support">Support</a>
                    </div>
                    <p class="text-gray-400 text-center mt-6">Copyright 2021 Company Name</p>
                </div>
            </footer>
        </div>
</template>
