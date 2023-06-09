<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import CreatePost from '../../Components/CreatePost.vue';

const props = defineProps([
  'posts'
])

</script>
<template>
    <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 p-6 container max-w-7xl mx-auto h-96">
        <CreatePost routeURL="services.create" name="Service"/>
        <CreatePost routeURL="demands.create" name="Demand"/>
    </main>
</template>
<script>
export default{
    layout: AppLayout,
}
</script>
