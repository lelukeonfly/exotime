<script setup>

import {useForm, router} from '@inertiajs/vue3'

const form = useForm({
    name: ''
})

const addSupply = () => {
    router.post(route('supplies.store'), form)
}
</script>
<template>
    <form @submit.prevent="addSupply">
        <input type="text" v-model="form.name">
        <button type="submit">Add Supply</button>
    </form>
</template>
