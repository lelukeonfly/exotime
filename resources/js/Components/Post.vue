<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    post: Object
})

</script>
<template>
        <Link :href="route('posts.show', post.id)" class="flex flex-col gap-3 flex-wrap bg-white rounded-lg p-3 cursor-pointer shadow h-full">
            <!-- PROFILE -->
        <div class="flex flex-wrap justify-between" @click.stop>
            <Link :href="route('dashboard')">
            <div class="flex items-center gap-1 w-fit hover:bg-gray-200 rounded-full p-1 transition-all">
                <img :src="post.user.profile_photo_url" class="rounded-full h-6"/>
                <div class="text-blue-600">@{{ post.user.username }}</div>
            </div>
            </Link>
            <div>
                {{ new Date(post.created_at).toLocaleDateString() }}
            </div>
        </div>
        <!-- /PROFILE -->

        <!-- TITLE -->
        <h2 class="text-3xl">{{ post.title }}</h2>
        <!-- /TITLE -->

        <!-- DESCRIPTION -->
        <p class="text-xl flex-1">{{ post.description }}</p>
        <!-- /DESCRIPTION -->

        <!-- CATEGORIES -->
        <div class="flex flex-wrap mt-3 gap-1" @click.stop>
            <Link v-for="category in post.categories"
            :href="route('categories.show', category.id)"
            :key="category.id"
            class="p-2 text-xs bg-gray-200 rounded-full hover">
                {{ category.name }}
        </Link>
        </div>
        <!-- /CATEGORIES -->
        </Link>
</template>
