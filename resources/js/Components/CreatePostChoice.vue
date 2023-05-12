<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="flex justify-between gap-5 m-5 h-96">
        <Link :href="route('services.create')" class="bg-gray-200 w-full rounded-lg grid items-center content-center text-center">Service</Link>
        <Link :href="route('demands.create')" class="bg-gray-200 w-full rounded-lg grid items-center content-center text-center">Demands</Link>
    </div>
</template>
