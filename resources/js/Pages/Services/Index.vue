<script setup>
import PostLayout from '@/Layouts/PostLayout.vue';
import Post from '../../Components/Post.vue';

defineProps([
  'services'
])

</script>
<template>
  <PostLayout>
    <Post v-for="service in services" :post="service"/>
  </PostLayout>
</template>
