<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import CreateCategory from '../../Components/CreateCategory.vue';

import {Link, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    post: Object,
    categories: Object
})

const defaultForm = {
    title: props.post.title,
    description: props.post.description,
    categories: props.post.categories.map(x => x.id)
}

if (props.post.postable_type == "App\\Models\\Service") {
    defaultForm.name = props.post.postable.name
    defaultForm.duration_min = props.post.postable.duration_min
}


if (props.post.postable_type == "App\\Models\\Demand") {
    defaultForm.location = props.post.postable.location;
    defaultForm.duration_min = props.post.postable.duration_min;
    defaultForm.starting_at = props.post.postable.starting_at;
    defaultForm.ending_at = props.post.postable.ending_at;
}

const form = useForm(defaultForm)

const sendUpdate = () => {
    //console.log(form)
    form.put(route('posts.update', props.post))
}

</script>
<template>
    <Link :href="route('posts.index')">back</Link>



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

        <hr style="border: 5px solid black">

        <!-- postable specific -->

        <div v-if="props.post.postable_type == 'App\\Models\\Service'">
            <div>
                <label>name</label>
                <input v-model="form.name" type="text" placeholder="name"/>
                <p v-if="form.errors.name">{{ form.errors.name }}</p>
            </div>

            <div>
                <label>duration</label>
                <input v-model="form.duration_min" type="number" placeholder="duration"/>
                <p v-if="form.errors.duration_min">{{ form.errors.duration_min }}</p>
            </div>
        </div>

        <div v-if="props.post.postable_type == 'App\\Models\\Demand'">
            <div>
                <label>location</label>
                <input v-model="form.location" type="text" placeholder="location"/>
                <p v-if="form.errors.location">{{ form.errors.location }}</p>
            </div>

            <div>
                <label>duration</label>
                <input v-model="form.duration_min" type="number" placeholder="duration"/>
                <p v-if="form.errors.duration_min">{{ form.errors.duration_min }}</p>
            </div>

            <div>
                <label>stargin at</label>
                <input v-model="form.starting_at" type="date" placeholder="starting_at"/>
            </div>
            <div>
                <label>ending at</label>
                <input v-model="form.ending_at" type="date" placeholder="ending_at"/>
            </div>

        </div>

        <hr style="border: 5px solid black">

        categories
        <div v-for="category in categories" :key="category.id">
            <input v-model="form.categories" :value="category.id" type="checkbox" />
            <label>{{ category.name }}</label>
        </div>

        {{ form.categories }}

        <CreateCategory/>

        <button type="submit">submit</button>
    </form>

    {{ form }}
</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
