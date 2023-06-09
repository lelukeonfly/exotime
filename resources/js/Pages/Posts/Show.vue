<script setup>
    import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import DirectButton from '../../Components/DirectButton.vue';
import UserLink from '../../Components/UserLink.vue';
import CreateFeedback from '../../Components/CreateFeedback.vue';

import {Link, router} from '@inertiajs/vue3';

const props = defineProps({
    login_user_id: Number,
    post: Object,
    requesters: Object
})

const delPost = () => {
    router.delete(route('posts.destroy', props.post))
}

const storeRequest = () => {
    router.post(route('storeRequest', props.post.id))
}

const acceptRequest = (user_id) => {
    router.put(route('acceptRequest', {post:props.post.id, user:user_id}))
}

const rejectRequest = (user_id) => {
    router.put(route('rejectRequest', {post:props.post.id, user:user_id}))
}

</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
        <div class="flex justify-between mb-5 bg-white p-3 px-5 rounded-lg">
            <div>
                <DirectButton routeURL="posts.index" content="Back" />
            </div>

            <div v-if="login_user_id == post.user_id" class="flex gap-3">
                <DirectButton routeURL="posts.edit" :model="post.id" content="Edit" />

                <div class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-blue-300 border-blue-500 cursor-pointer">
                    <a @click="delPost">Delete</a>
                </div>


            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <div class="flex flex-wrap md:flex-nowrap gap-3 w-full">

                <div class="p-5 bg-white rounded-lg w-full">
                    <div class="flex flex-wrap justify-between items-center" @click.stop>
                        <UserLink :user="post.user" class="my-auto" />
                        <div v-if="post.status == 'open'" class="p-2 rounded-lg bg-lime-200">
                            <span class="inline-block h-3 w-3 bg-lime-500 rounded-full"></span>
                            open
                        </div>

                        <div v-if="post.status == 'closed'" class="p-2 rounded-lg bg-rose-300">
                            <span class="inline-block h-3 w-3 bg-rose-500 rounded-full"></span>
                            closed
                        </div>
                        <div class="my-auto">
                            {{ new Date(post.created_at).toLocaleDateString() }}
                        </div>
                    </div>
                    <!-- /PROFILE -->
                    <div class="bg-gray-100 rounded-lg my-3 p-3">
                        <h1 class="text-6xl">{{ post.title }}</h1>
                        <p class="my-5 text-2xl">{{ post.description }}</p>
                    </div>


                    <div class="flex flex-wrap sm:flex-nowrap gap-3">
                        <div class="flex flex-col gap-3 w-full">
                            <div v-if="post.supplies.length" class="bg-gray-100 rounded-lg p-5">
                                <div class="inline-block">
                                    <h2 class="text-3xl">Supplies</h2>
                                    <ul class="mt-3">
                                        <li v-for="supply in post.supplies" :key="supply.id" class="list-inside list-disc my-4">
                                            <span class="text-xl bg-gray-200 rounded-lg px-2 py-1">{{supply.name}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="flex flex-wrap justify-between text-xl bg-gray-100 rounded-lg p-5">
                                <div class="my-auto">Preferred location: {{ post.preferred_location }}</div>
                                <div class="my-auto">Estimated time: {{ post.duration_min }} min</div>
                            </div>
                        </div>


                        <div v-if="post.categories.length" class="bg-gray-100 rounded-lg p-5 w-full sm:w-auto">
                            <h2 class="text-3xl">Categories</h2>
                            <div class="mt-5 flex flex-wrap gap-1">
                                <label v-for="category in post.categories" class="text-xs bg-gray-200 rounded-full hover cursor-pointer" :key="category.id">
                                    <div class="p-2 rounded-full bg-lime-300">{{ category.name }}</div>
                                </label>
                            </div>
                        </div>

                    </div>
                    <!-- postable specific -->
                    <!--Service v-if="post.postable_type=='App\\Models\\Service'" :postable="post.postable" />
                        <Demand v-if="post.postable_type=='App\\Models\\Demand'" :postable="post.postable" /-->
                </div>

                <div v-if="requesters.length && login_user_id == post.user_id" class="p-5 bg-white rounded-lg md:w-1/3 w-full">
                    <div v-for="requester in requesters" :key="requester.id">
                        <div v-if="requester.pivot.status == 'pending'" class="p-3 rounded-lg mt-3 bg-gray-100">
                            <UserLink :user="requester" />
                            <div class="flex justify-between mt-3 gap-3">
                                <button class="border border-green-500 p-1 rounded-lg bg-lime-400 w-full"
                                    @click="acceptRequest(requester.id)">
                                    accept
                                </button>
                                <button class="border border-red-500 p-1 rounded-lg bg-rose-400 w-full"
                                    @click="rejectRequest(requester.id)">
                                    reject
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="post.status == 'open' && login_user_id != post.user_id" class="p-5 bg-white rounded-lg w-full">
                <button class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-blue-300 border-blue-500 w-full" @click="storeRequest">
                    request
                </button>
            </div>
        </div>

        <!-- comment section -->
        <div class="mt-5 p-5 bg-white rounded-lg grid gap-5">

            <CreateFeedback parent_model="Post" :parent_id="post.id" class="rounded-lg bg-gray-100 p-3"/>

            <div v-for="feedback in post.feedbacks" :key="feedback.id" class="rounded-lg bg-gray-100 p-3">
                <div class="flex justify-between">
                    <div><UserLink :user="feedback.user"/></div>
                    <div>{{ new Date(feedback.created_at).toLocaleDateString() }}</div>

                </div>
                <!--rating-->
                <div class="star-rating">
                    <span class="star" v-for="i in 5" :key="i" :class="{ 'filled': i <= feedback.rating }">&#9733;</span>
                </div>
                <div>
                    {{ feedback.feedback }}
                </div>
            </div>
        </div>
    </main>
</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
<style scoped>
.star-rating {
    display: flex;
}

.star {
    font-size: 2rem;
    color: #aaa;
    transition: color 0.2s ease-out;
    margin-right: 5px;
}

.star.filled {
    color: gold;
}
</style>
