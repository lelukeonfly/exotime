<script setup>
    import AppLayout from '../../Layouts/AppLayout.vue';
import Service from '../../Components/Service.vue';
import Demand from '../../Components/Demand.vue';
import DirectButton from '../../Components/DirectButton.vue';
import UserLink from '../../Components/UserLink.vue';

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
                <DirectButton routeURL="posts.index" content="Back" color="blue-500"/>
            </div>

            <div class="flex gap-3">
                <DirectButton routeURL="posts.edit" :model="post" content="Edit" color="rose-500"/>

                <div>
                    <a @click="delPost">delete</a>
                </div>
            </div>
        </div>

        <div class="p-5 bg-white rounded-lg">

            <div class="flex flex-wrap justify-between" @click.stop>
                <UserLink :user="post.user"/>
                <div class="my-auto">
                    {{ new Date(post.created_at).toLocaleDateString() }}
                </div>
            </div>
            <!-- /PROFILE -->
            <h1 class="text-6xl">{{ post.title }}</h1>
            <div class="my-3 border-b-1 bg-gradient-to-r from-black to-transparent h-[1px]"></div>
            <p class="text-2xl">{{ post.description }}</p>

            <!-- postable specific -->
            <Service v-if="post.postable_type=='App\\Models\\Service'" :postable="post.postable" />
            <Demand v-if="post.postable_type=='App\\Models\\Demand'" :postable="post.postable" />
        </div>
    </main>
</template>
<script>
    export default{
        layout: AppLayout
    }
</script>
