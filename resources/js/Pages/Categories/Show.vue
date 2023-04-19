<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Post from '../../Components/Post.vue';

const props = defineProps({
    category: Object
})

</script>
<template>
    <h1 class="text-4xl">{{ category.name }}</h1>
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
