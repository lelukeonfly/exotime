<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Post from '@/Components/Post.vue';
    import UserLink from '@/Components/UserLink.vue';

    const props = defineProps({
        forMe: Object,
        byMe: Object
    })

</script>
<template>
    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="bg-white p-6 rounded-lg text-center text-4xl">Requests for me</h1>
    </div>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <div v-for="post in forMe">
            <post :post="post">
            <div v-for="request in post.requested_by_users" class="m-3 p-2 flex justify-between bg-white rounded-lg ">
                <UserLink :user="request"/>
                <p class="my-auto">status: {{ request.pivot.status }}</p>
            </div>
            </post>
        </div>
    </div>
    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="bg-white p-6 rounded-lg text-center text-4xl">Requests by me</h1>
    </div>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
        <div v-for="post in byMe.requested_posts">
            <post :post="post">
            <p class="text-center">{{ post.pivot.status }}</p>
            </post>
        </div>
    </div>
</template>

<script>
    export default{
        layout: AppLayout,
    }
</script>
