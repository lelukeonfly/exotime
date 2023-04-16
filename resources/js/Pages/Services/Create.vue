<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import CreateCategory from '../../Components/CreateCategory.vue';

const props = defineProps({
    categories: Object
})

const form = useForm({
    title: '',
    description: '',
    duration_min: null,
    preferred_location: '',
    status: '',
    categories: []
})


const submit = () => {
    form.post(route('services.store'))
}


</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
    <Link :href="route('services.index')">back</Link>

    <div>{{form.errors}}</div>
    <form @submit.prevent="submit">

        <input v-model="form.title" type="text" placeholder="Titel"/>
        <p v-if="form.errors.title">{{ form.errors.title }}</p>

        <textarea v-model="form.description" placeholder="description"></textarea>
        <p v-if="form.errors.description">{{ form.errors.description }}</p>

        <input v-model="form.duration_min" type="number" placeholder="duration"/>
        <p v-if="form.errors.duration_min">{{ form.errors.duration_min }}</p>

        <input v-model="form.status" type="text" placeholder="status"/>
        <p v-if="form.errors.status">{{ form.errors.status }}</p>

        <input v-model="form.preferred_location" type="text" placeholder="preferred_location"/>
        <p v-if="form.errors.preferred_location">{{ form.errors.preferred_location }}</p>

        <div v-for="category in categories" :key="category.id">
            <input v-model="form.categories" :value="category.id" type="checkbox" :id="'_'+category.id">
            <label :for="'_'+category.id">{{ category.name }}</label>
        </div>

        <CreateCategory/>

        <button type="submit">submit</button>
    </form>
    </main>
    <p>{{ form }}</p>
</template>
<script>
export default{
    layout: AppLayout
}
</script>
<style scoped>
</style>
