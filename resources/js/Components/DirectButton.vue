<script setup>
import {Link} from '@inertiajs/vue3';

    const props = defineProps({
        routeURL: String,
        model: [Number, Object],
        color: String,
        content: String
    })

</script>
<template>
    <Link :href="route(routeURL, model)"
    class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-[#4d6ed3] border-[#4d6ed3]">
    {{ content }}
    </Link>
</template>

