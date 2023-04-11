<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import CreateCategory from '../../Components/CreateCategory.vue';

import {Link} from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    post: Object,
    categories: Object
})

const usedCategories = props.post.categories.map(x => props.categories.findIndex(y => y.id === x.id));

const isChecked = (index) => {
    return usedCategories.includes(index);
}

</script>
<template>
    <Link :href="route('posts.index')">back</Link>
    <p>{{ post.user.username }}</p>
    <p>{{ post.created_at }}</p>

    <!--TODO: REPLACE WITH VMODEL-->

    <!-- postable specific -->
    <div v-for="(category, index) in categories" :key="category.id">
        <input :value="category.id" type="checkbox" :id="'_'+category.id" :checked="isChecked(index)">
        <label :for="'_'+category.id">{{ category.name }}</label>
    </div>
    <CreateCategory/>

</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
