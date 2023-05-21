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
        <button type="submit" class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-blue-300 border-blue-500 mt-3 w-full">Add Category</button>
    </form>
</template>
