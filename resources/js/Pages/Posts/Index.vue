<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Post from '../../Components/Post.vue';
import CreatePost from '../../Components/CreatePost.vue';

const props = defineProps([
  'posts'
])

</script>
<template>
    <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <CreatePost routeURL="posts.create" name="create"/>
        <div v-for="post in posts" :key="post.id">
            <Post :post="post" :key="post.id" />
        </div>
    </main>
</template>
<script>
export default{
    layout: AppLayout,
}
</script>
