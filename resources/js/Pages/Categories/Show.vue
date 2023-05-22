<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Post from '../../Components/Post.vue';

const props = defineProps({
    category: Object
})

</script>
<template>
    <div class="grid p-6 container max-w-7xl mx-auto">
        <h1 class="text-4xl bg-white p-6 rounded-lg shadow">{{ category.name }}</h1>
    </div>
    <Post v-for="post in category.posts.post" :post="post" :key="post.id"/>
    <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <div v-for="post in category.posts" :key="post.id">
            <Post :post="post" :key="post.id" />
        </div>
    </main>
</template>

<script>
export default {
    layout: AppLayout
}
</script>
