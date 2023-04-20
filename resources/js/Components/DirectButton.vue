<script setup>
import {Link} from '@inertiajs/vue3';

    const props = defineProps({
        routeURL: String,
        model: [Number, Object],
        color: String,
        content: String
    })

const colors = {};
      colors['hover:bg-' + props.color] = true;
      colors['text-' + props.color] = true;
      colors['border-' + props.color] = true;
</script>
<template>
    <Link :href="route(routeURL, model)"
    class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded"
    :class="colors">
    {{ content }}
    </Link>
</template>

