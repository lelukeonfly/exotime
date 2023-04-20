<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import CreateCategory from '../../Components/CreateCategory.vue';
import CreateSupply from '../../Components/CreateSupply.vue';
import Option from '../../Components/Option.vue';
import InputField from '../../Components/InputField.vue';
import InputTextBox from '../../Components/InputTextBox.vue';
import InputStatus from '../../Components/InputStatus.vue';

const props = defineProps({
    categories: Object,
    supplies: Object
})

const form = useForm({
    title: '',
    description: '',
    duration_min: null,
    preferred_location: '',
    status: '',
    supplies: [],
    categories: []
})


const submit = () => {
    form.post(route('demands.store'))
}


</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
    <Link :href="route('demands.index')">back</Link>

    <div>{{form.errors}}</div>
    <form @submit.prevent="submit">

            <InputField v-model="form.title" label="Title" type="text" :error="form.errors.title" />

            <InputTextBox v-model="form.description" label="description" :error="form.errors.description" />

            <InputField v-model="form.preferred_location" label="preferred location" type="text" :error="form.errors.preferred_location" />

            <InputField v-model="form.duration_min" label="duration in min." type="number" :error="form.errors.duration_min" />

            <InputStatus v-model="form.status" label="Status" :error="form.errors.status" />

            category
            <div class="flex flex-wrap gap-1">
                <Option v-for="category in categories" v-model="form.categories" :key="category.id" :option="category"/>
            </div>
            <CreateCategory/>
            supplies
            <div class="flex flex-wrap gap-1">
                <Option v-for="supply in supplies" v-model="form.supplies" :key="supply.id" :option="supply"/>
            </div>

            <CreateSupply/>

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
