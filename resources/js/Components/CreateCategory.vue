<script setup>

import {useForm, router} from '@inertiajs/vue3'

const form = useForm({
    name: '',
    description: ''
})

const addCategory = () => {
    router.post(route('categories.store'), form)
}
</script>
<template>
    <form @submit.prevent="addCategory">
        <input type="text" v-model="form.name">
        <input type="text" v-model="form.description">
        <button type="submit">Add Category</button>
    </form>
</template>
