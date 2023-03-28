<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';


const props = defineProps({
    post: Object
})

</script>
<template>
    <p>{{ post.user.username }}</p>
    <p>{{ post.created_at }}</p>

    <h1 class="text-4xl">{{ post.title }}</h1>
    <p>{{ post.description }}</p>

    <!-- postable specific -->
    <Service v-if="post.postable_type=='App\\Models\\Service'" :postable="post.postable" />
    <Demand v-if="post.postable_type=='App\\Models\\Demand'" :postable="post.postable" />
</template>
<script>
export default{
    layout: AppLayout
}
</script>
