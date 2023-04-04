<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';

import {Link} from '@inertiajs/vue3';

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
    {{ post }}
    <Link :href="route('posts.index')">back</Link>
    <p>{{ post.user.username }}</p>
    <p>{{ post.created_at }}</p>

    <!--TODO: REPLACE WITH VMODEL-->
    <input class="text-4xl" :value="post.title" />
    <input :value="post.description" />
    <textarea>{{post.description}}</textarea>

    <!--export to other component-->
    <input type="number" :value="post.postable.duration_min"/>

    <!-- postable specific -->
    <Service v-if="post.postable_type=='App\\Models\\Service'" :postable="post.postable" />
    <Demand v-if="post.postable_type=='App\\Models\\Demand'" :postable="post.postable" />
    <div v-for="(category, index) in categories" :key="category.id">
        <input :value="category.id" type="checkbox" :id="'_'+category.id" :checked="isChecked(index)">
        <label :for="'_'+category.id">{{ category.name }}</label>
    </div>

</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
