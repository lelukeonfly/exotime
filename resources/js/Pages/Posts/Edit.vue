<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import CreateCategory from '../../Components/CreateCategory.vue';
import DirectButton from '../../Components/DirectButton.vue';
import Option from '../../Components/Option.vue';
import InputField from '../../Components/InputField.vue';
import InputTextBox from '../../Components/InputTextBox.vue';
import CreateSupply from '../../Components/CreateSupply.vue';
import InputStatus from '../../Components/InputStatus.vue';

import {Link, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    post: Object,
    categories: Object,
    supplies: Object
})

const defaultForm = {
    title: props.post.title,
    description: props.post.description,
    categories: props.post.categories.map(x => x.id),
    supplies: props.post.supplies.map(x => x.id),
    duration_min: props.post.duration_min,
    preferred_location: props.post.preferred_location,
    status: props.post.status
}

const form = useForm(defaultForm)

const sendUpdate = () => {
    form.put(route('posts.update', props.post))
}

</script>
<template>

    <main class="p-6 container max-w-7xl mx-auto">

        <DirectButton routeURL="posts.index" color="red-500" content="back" class="inline-block"/>

        <p>{{ post.user.username }}</p>
        <p>{{ post.created_at }}</p>

        <form @submit.prevent="sendUpdate">

            <InputField v-model="form.title" label="Title" type="text" :error="form.errors.title" />

            <InputTextBox v-model="form.description" label="description" :error="form.errors.description" />

            <InputField v-model="form.preferred_location" label="preferred location" type="text" :error="form.errors.preferred_location" />

            <InputField v-model="form.duration_min" label="duration in min." type="number" :error="form.errors.duration_min" />

            <InputStatus v-model="form.status" label="Status" :error="form.errors.status" />

            <!-- postable specific -->

            <div v-if="props.post.postable_type == 'App\\Models\\Service'">
            </div>

            <div v-if="props.post.postable_type == 'App\\Models\\Demand'">
            </div>

            category
            <div class="flex flex-wrap gap-1">
                <Option v-for="category in categories" v-model="form.categories" :key="category.id" :option="category"/>
            </div>
            supplies
            <div class="flex flex-wrap gap-1">
                <Option v-for="supply in supplies" v-model="form.supplies" :key="supply.id" :option="supply"/>
            </div>

            {{ form.supplies }}

            <CreateCategory/>
            <CreateSupply/>

            <button type="submit">submit</button>
        </form>

        {{ form }}
    </main>
</template>
<style scoped>
</style>
<script>
    export default{
        layout: AppLayout
    }
</script>
