<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Post from '../../Components/Post.vue';

const props = defineProps([
  'demands'
])

</script>
<template>
    <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <Link :href="route('demands.create')" class="bg-red-200 rounded-xl grid items-center content-center text-center">create</Link>
        <div v-for="post in demands" :key="post.id">
            <Post :post="post" :key="post.id"/>
        </div>
    </main>
    <aside>
    </aside>
</template>
<script>
export default{
    layout: AppLayout,
}
</script>
