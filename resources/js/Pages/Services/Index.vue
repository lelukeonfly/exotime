<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Post from '../../Components/Post.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps([
  'services'
])

console.log(props.services)

</script>
<template>
    <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <Link :href="route('services.create')" class="bg-red-200 rounded-xl grid items-center content-center text-center">create</Link>
        <Post v-for="service in services" :post="service" :key="service.id"/>
    </main>
    <aside>
    </aside>
</template>
<script>
export default{
    layout: AppLayout,
}
</script>
