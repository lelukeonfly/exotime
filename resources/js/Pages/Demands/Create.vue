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
    status: 'open',
    supplies: [],
    categories: []
})


const submit = () => {
    form.post(route('demands.store'))
}


</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
        <Link :href="route('demands.index')" class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-blue-300 border-blue-500 mb-3 inline-block">back</Link>

        <div v-if="form.errors.length">{{form.errors}}</div>
        <form @submit.prevent="submit" class="bg-white rounded-lg p-6">

            <!--InputField v-model="form.title" label="Title" type="text" :error="form.errors.title" /-->
            <input v-model="form.title" type="text" placeholder="Title" class="w-full border-0 border-b-2 text-4xl bg-transparent border-top-none rounded-lg"/>
            <p class="text-red-500" v-if="form.errors.title">{{ form.errors.title }}</p>

            <!--InputTextBox v-model="form.description" label="description" :error="form.errors.description" /-->
            <div class="sm:flex justify-between gap-6 mt-6">
                <div class="w-full">
                    <textarea v-model="form.description" rows="6" class="block w-full rounded-lg bg-transparent text-xl resize-none " placeholder="This is the description of the Post..."></textarea>
                    <p class="text-red-500" v-if="form.errors.description">{{ form.errors.description }}</p>
                </div>
                <div class="grid gap-6 mt-6 sm:mt-0">

                    <!--InputField v-model="form.preferred_location" label="preferred location" type="text" :error="form.errors.preferred_location" /-->
                    <div>
                    <input v-model="form.preferred_location" type="text" placeholder="preferred location" class="w-full text-xl bg-transparent rounded-lg"/>
                    <p class="text-red-500" v-if="form.errors.preferred_location">{{ form.errors.preferred_location }}</p>
                    </div>
                    <div>
                    <input v-model="form.duration_min" type="number" placeholder="estimated duration" class="w-full text-xl bg-transparent rounded-lg after:content-['min']"/>
                    <p class="text-red-500" v-if="form.errors.duration_min">{{ form.errors.duration_min }}</p>
                    </div>
                    <InputStatus v-model="form.status" label="Status" :error="form.errors.status" />
                </div>
            </div>




            <div class="sm:flex gap-6 mt-4">
                <div class="flex-1">
                    <label>Categories</label>
                    <div class="flex flex-wrap gap-1 border border-gray-500 rounded-lg p-2">
                        <Option v-for="category in categories" v-model="form.categories" :key="category.id" :option="category"/>
                    </div>
                </div>

                <div class="flex-1">
                    <label>Supplies</label>
                    <div class="flex flex-wrap gap-1 border border-gray-500 rounded-lg p-2">
                        <Option v-for="supply in supplies" v-model="form.supplies" :key="supply.id" :option="supply"/>
                    </div>
                </div>
            </div>

            <div class="sm:flex flex-wrap gap-6 mt-4 justify-between">
                <div class="flex-1">
                    <label>Create a new Category</label>
                    <div class="p-4 border border-gray-500 rounded-lg">
                        <CreateCategory/>
                    </div>
                </div>
                <div class="flex-1">
                    <label>Create a new Supply</label>
                    <div class="p-4 border border-gray-500 rounded-lg">
                        <CreateSupply/>
                    </div>
                </div>
            </div>

            <button type="submit" class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-blue-300 border-blue-500 mt-6">submit</button>
        </form>
    </main>
</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
<style scoped>
</style>
