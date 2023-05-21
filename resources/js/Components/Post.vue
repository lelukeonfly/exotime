<script setup>
import { Link } from '@inertiajs/vue3';
import UserLink from '../Components/UserLink.vue';

const props = defineProps({
    post: Object
})

</script>
<template>
        <Link :href="route('posts.show', post.id)" class="flex flex-col gap-3 flex-wrap bg-white rounded-lg p-3 cursor-pointer shadow h-full">
        <div v-if="post.postable_type == 'App\\Models\\Service'" class="text-center"><i>Service</i></div>
        <div v-if="post.postable_type == 'App\\Models\\Demand'" class="text-center"><i>Demand</i></div>
        <div class="bg-gray-100 rounded-lg p-1">
        </div>
            <!-- PROFILE -->
        <div class="flex flex-wrap justify-between" @click.stop>
            <UserLink :user="post.user"/>
            <div class="my-auto">
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
        <div class="bg-gray-100 rounded-lg p-1" @click.stop>
            <slot />
        </div>
        </Link>
</template>
