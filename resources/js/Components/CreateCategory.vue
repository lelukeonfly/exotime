<script setup>

import {useForm, router} from '@inertiajs/vue3'
import InputField from '@/Components/InputField.vue';
import InputTextBox from '@/Components/InputTextBox.vue';

const form = useForm({
    name: '',
    description: ''
})

const addCategory = () => {
    router.post(route('categories.store'), form)
    form.name = ''
    form.description = ''
}
</script>
<template>
    <form @submit.prevent="addCategory">
        <InputField type="text" label="Category name" v-model="form.name" />
        <InputTextBox type="text" label="Category description" v-model="form.description" />
        <button type="submit">Add Category</button>
    </form>
</template>
