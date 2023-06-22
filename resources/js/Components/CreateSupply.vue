<script setup>

import {useForm, router} from '@inertiajs/vue3'
import InputField from '@/Components/InputField.vue';

const form = useForm({
    name: ''
})

const addSupply = () => {
    router.post(route('supplies.store'), form, {preserveScroll: true})
    form.name = ''
}
</script>
<template>
    <form @submit.prevent="addSupply">
        <InputField type="text" label="Supply name" v-model="form.name" />
        <button type="submit" class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-[#4d6ed3] border-[#4d6ed3] mt-3 w-full">Add Supply</button>
    </form>
</template>
