<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import CreateCategory from '../../Components/CreateCategory.vue';
import DirectButton from '../../Components/DirectButton.vue';
import Option from '../../Components/Option.vue';

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

/*if (props.post.postable_type == "App\\Models\\Service") {
    defaultForm.name = props.post.postable.name
    defaultForm.duration_min = props.post.postable.duration_min
}


if (props.post.postable_type == "App\\Models\\Demand") {
    defaultForm.location = props.post.postable.location;
    defaultForm.duration_min = props.post.postable.duration_min;
    defaultForm.starting_at = props.post.postable.starting_at;
    defaultForm.ending_at = props.post.postable.ending_at;
}*/

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

        <!--TODO: REPLACE WITH VMODEL-->
        <form @submit.prevent="sendUpdate">
            <div>
                <label>Titel</label>
                <input v-model="form.title" type="text">
            </div>

            <div>
                <label>description</label>
                <textarea v-model="form.description" placeholder="description"></textarea>
            </div>
            <div>
                <label>preferred location</label>
                <input v-model="form.preferred_location" type="text" placeholder="location"/>
                <p v-if="form.errors.preferred_location">{{ form.errors.preferred_location}}</p>
            </div>

            <div>
                <label>duration</label>
                <input v-model="form.duration_min" type="text" placeholder="duration"/>
                <p v-if="form.errors.duration_min">{{ form.errors.duration_min }}</p>
            </div>

            <div>
                <label>status</label>
                <input v-model="form.status" type="text" placeholder="status"/>
                <p v-if="form.errors.status">{{ form.errors.status }}</p>
            </div>

            <!-- postable specific -->

            <div v-if="props.post.postable_type == 'App\\Models\\Service'">
            </div>

            <div v-if="props.post.postable_type == 'App\\Models\\Demand'">
            </div>

            category
            <div class="flex flex-wrap gap-1">
                <label v-for="category in categories" :key="category.id"
                    class="text-xs bg-gray-200 rounded-full hover cursor-pointer">
                    <input v-model="form.categories" :value="category.id" type="checkbox" class="hidden peer" />
                    <div class="p-2 rounded-full peer-checked:bg-lime-300">{{ category.name }}</div>
                </label>
            </div>
            supplies
            <div class="flex flex-wrap gap-1">
                <label v-for="supply in supplies" :key="supply.id"
                    class="text-xs bg-gray-200 rounded-full hover cursor-pointer">
                    <input v-model="form.supplies" :value="supply.id" type="checkbox" class="hidden peer" />
                    <div class="p-2 rounded-full peer-checked:bg-lime-300">{{ supply.name }}</div>
                </label>
            </div>

            {{ form.categories }}

            <CreateCategory/>

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
