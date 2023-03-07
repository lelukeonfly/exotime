<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import axios from 'axios';

const page = computed(() => usePage().props)

const post = ref({
    title: null,
    description: null,
    //_token: page.props.csrf_token
})

function submit(){
    //router.post('/services', post)
    //console.log(post)
    //axios.delete('/services', post)
    axios.get(route('services.index'))
    .then(res => {
        console.log(res)
    })
}


</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
    <Link :href="route('services.index')">back</Link>

    <form @submit.prevent="submit">
        <input v-model="post.title" type="text" placeholder="Titel"/>
        <textarea v-model="post.description" placeholder="description"></textarea>
        <button type="submit">submit</button>
    </form>

    <p>{{ post.title }}</p>
    <p>{{ post.description }}</p>
    </main>
</template>
<script>
export default{
    layout: AppLayout
}
</script>
<style scoped>
</style>
