<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';

import {Link, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    post: Object,
    categories: Object
})

const form = useForm({
    name: '',
    description: ''
})

//const create_category = ref('')
//const category = "this is cat";

//todo: add categories

//try->//https://larainfo.com/blogs/laravel-9-inertia-vue-3-crud-tutorial-example
const addCategory = () => {
    form.post(route('categories.store')).then(
        response => {
            if (response.status = 201){
                console.log(201)
            }else{
                console.log(!201)
            }
        }
    )
}

//const addCategory = () => {
  //form.post(route("categories.store"), form).then(response => {
    //if (response.status === 201) {
    //console.log('201111111')
    //} else {
    //console.log('nononononoo')
    //}
  //}).catch(error => {
    //// Handle request error
    //console.log('errorrr')
  //});
//}
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
    <form @submit.prevent="addCategory">
        <input type="text" v-model="form.name">
        <input type="text" v-model="form.description">
        <button type="submit">Add Category</button>
    </form>

</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
