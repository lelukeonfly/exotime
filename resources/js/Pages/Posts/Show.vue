<script setup>
    import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import DirectButton from '../../Components/DirectButton.vue';
import UserLink from '../../Components/UserLink.vue';
import CreateFeedback from '../../Components/CreateFeedback.vue';

import {Link, router} from '@inertiajs/vue3';

const props = defineProps({
    post: Object
})

const delPost = () => {
    router.delete(route('posts.destroy', props.post))
}

</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
        <div class="flex justify-between mb-5">
            <div>
                <DirectButton routeURL="posts.index" content="Back" color="lime-500"/>
            </div>

            <div class="flex gap-3">
                <DirectButton routeURL="posts.edit" :model="post.id" content="Edit" color="rose-500"/>

                <div>
                    <a @click="delPost">delete</a>
                </div>

                <DirectButton routeURL="posts.destroy" :model="post" content="Delete" color="red-500"/>
            </div>
        </div>

        <div class="p-5 bg-white rounded-lg">

            <div class="flex flex-wrap justify-between" @click.stop>
                <UserLink :user="post.user" class="mb-3"/>
                <div class="my-auto">
                    {{ new Date(post.created_at).toLocaleDateString() }}
                </div>
            </div>
            <!-- /PROFILE -->
            <h1 class="text-6xl">{{ post.title }}</h1>
            add a colored dot here and background color
            <div class="flex justify-between">
                <div class="rounded-full bg-lime-500 p-2">(colored dot){{ post.status }} -> (in_progress, open, closed)</div>
            </div>
            <div class="my-3 border-b-1 bg-gradient-to-r from-black via-transparent to-transparent h-[1px]"></div>
            <p class="text-2xl">{{ post.description }}</p>

            <div class="my-3 border-b-1 bg-gradient-to-r from-transparent via-transparent to-black h-[1px]"></div>
            <div class="inline-block">
                <h2 class="text-3xl">Supplies</h2>
                <ul>
                    <li v-for="supply in post.supplies" :key="supply.id" class="list-inside list-disc text-xl">{{supply.name}}</li>
                </ul>
            </div>

            <!-- postable specific -->
            <Service v-if="post.postable_type=='App\\Models\\Service'" :postable="post.postable" />
            <Demand v-if="post.postable_type=='App\\Models\\Demand'" :postable="post.postable" />

            <div class="flex justify-between">

                <div class="my-auto">Preferred location: {{ post.preferred_location }}</div>
                <div class="my-auto">Estimated time: {{ post.duration_min }} min</div>
        </div>
        </div>
        <!-- comment section -->
        <div class="mt-5 p-5 bg-white rounded-lg grid gap-5">

            <CreateFeedback parent_model="Post" :parent_id="post.id"/>

            <div v-for="feedback in post.feedbacks" :key="feedback.id" class="rounded-lg bg-gray-100 p-3">
                <div class="flex justify-between">
                    <div><UserLink :user="feedback.user"/></div>
                    <div>{{ feedback.created_at }}</div>
                </div>
                <!--rating-->
                <div>{{feedback.rating}}/10</div>
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
