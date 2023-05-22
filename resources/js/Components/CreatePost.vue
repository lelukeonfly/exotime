<script setup>
    import {Link} from '@inertiajs/vue3'

    const props = defineProps({
        routeURL: String,
        name: String
    })
</script>
<template>
    <Link :href="route(routeURL)" class="bg-slate-200 rounded-xl grid items-center content-center text-center text-2xl shadow">{{ name }}</Link>
</template>
