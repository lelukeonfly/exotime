<script setup>

import {useForm, router} from '@inertiajs/vue3'
import InputField from '@/Components/InputField.vue';

const form = useForm({
    name: ''
})

const addSupply = () => {
    router.post(route('supplies.store'), form)
}
</script>
<template>
    <form @submit.prevent="addSupply">
        <InputField type="text" label="Supply name" v-model="form.name" />
        <button type="submit">Add Supply</button>
    </form>
</template>
