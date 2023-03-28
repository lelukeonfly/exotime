<script setup>
import Post from '../../Components/Post.vue';

const props = defineProps({
    category: Object
})

</script>
<template>
    <h1 class="text-4xl">{{ category.name }}</h1>
    {{ category.posts }}
    <Post v-for="post in category.posts.post" :post="post" :key="post.id"/>
</template>
