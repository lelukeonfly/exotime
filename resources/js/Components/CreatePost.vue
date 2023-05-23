<script setup>
    import {Link} from '@inertiajs/vue3'

    const props = defineProps({
        routeURL: String,
        name: String
    })
</script>
<template>
    <Link :href="route(routeURL)" class="bg-blue-900 text-white rounded-xl grid items-center content-center text-center text-2xl shadow min-h-[8em]">{{ name }}</Link>
</template>
