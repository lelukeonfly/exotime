<script setup>
    import {Link} from '@inertiajs/vue3'

    const props = defineProps({
        user: Object
    })
</script>
<template>
    <Link :href="route('profile', user.id)">
    <div class="flex items-center gap-1 w-fit hover:bg-gray-200 rounded-full p-1 transition-all">
        <img :src="user.profile_photo_url" class="rounded-full h-6"/>
        <div class="text-blue-600">@{{ user.username }}</div>
    </div>
    </Link>
</template>
